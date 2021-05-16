<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use ParagonIE\Halite\Alerts\CannotPerformOperation;
use ParagonIE\Halite\Alerts\InvalidKey;
use ParagonIE\Halite\Alerts\InvalidMessage;
use ParagonIE\Halite\Alerts\InvalidSignature;
use ParagonIE\Halite\Asymmetric\Crypto as Asymmetric;
use ParagonIE\Halite\Asymmetric\EncryptionPublicKey;
use ParagonIE\Halite\HiddenString;
use ParagonIE\Halite\KeyFactory;
use ParagonIE\Halite\Symmetric\Crypto as Symmetric;
use SodiumException;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     * @throws InvalidMessage
     */
    public function symmetric()
    {
        $encryptionKey = KeyFactory::generateEncryptionKey();

        $message = new HiddenString('This is a confidential message for your eyes only.');

        $ciphertext = Symmetric::encrypt($message, $encryptionKey);
        $decrypted = Symmetric::decrypt($ciphertext, $encryptionKey);

        return view('encryption-symmetric', [
            'encryptionKey' => $encryptionKey->getRawKeyMaterial(),
            'message' => $message,
            'ciphertext' => $ciphertext,
            'decrypted' => $decrypted
        ]);
    }

    /**
     * @return Application|Factory|View
     * @throws InvalidKey
     * @throws CannotPerformOperation
     * @throws InvalidMessage
     */
    public function asymmetricAnonymous()
    {
        $message = new HiddenString("This is message. Your message here. Any string content will do just fine.");

        /*
         * Generisanje jednog para kljuceva
         */
        $seal_keypair = KeyFactory::generateEncryptionKeyPair();
        /*
         * Javni i tajni kljuc
         */
        $seal_secret = $seal_keypair->getSecretKey();
        $seal_public = $seal_keypair->getPublicKey();

        /*
         * Kriptovanje poruke sa javnim kljucem
         */
        $sealed = Asymmetric::seal(
            $message,
            $seal_public
        );

        /*
         * Dekriptovanje tajne poruke tajnim kljucem (i javnim dobijenim iz tajnog funkcjiom sodium_crypto_box_publickey_from_secretkey())
         */
        $opened = Asymmetric::unseal(
            $sealed,
            $seal_secret
        );

        return view('encryption-asymmetric-anonymous', [
            'message' => $message,
            'sealSecret' => $seal_secret->getRawKeyMaterial(),
            'sealPublic' => $seal_public->getRawKeyMaterial(),
            'sealed' => $sealed,
            'opened' => $opened
        ]);
    }

    /**
     * @return Application|Factory|View
     * @throws InvalidKey
     * @throws SodiumException
     */
    public function asymmetricAuthenticated()
    {
        $alice_message = new HiddenString("This is message from Alice. Your message here. Any string content will do just fine.");
        $bob_message = new HiddenString("This is message from Bob. Your message here. Any string content will do just fine.");

        /*
         * Alisin generise par kljuceva
         * Bobov generise par kljuceva
         */
        $aliceEncryptionPair = KeyFactory::generateEncryptionKeyPair();
        $bobEncriptionPair = KeyFactory::generateEncryptionKeyPair();

        /*
         * Alisin tajni i javni kljuc
         */
        $alice_secret = $aliceEncryptionPair->getSecretKey();
        $alice_public = $aliceEncryptionPair->getPublicKey();

        /*
         * Bobov tajni i javni kljuc
         */
        $bob_secret = $bobEncriptionPair->getSecretKey();
        $bob_public = $bobEncriptionPair->getPublicKey();

        /*
         * Alisa salje Bobu svoj javni kljuc (hexadecimalno)
         * Bob salje Alisi svoj javni kljuc (hexadecimalno)
         */
        $send_to_bob = sodium_bin2hex($alice_public->getRawKeyMaterial());
        $send_to_alice = sodium_bin2hex($bob_public->getRawKeyMaterial());

        /*
         * Bob prima Alisin javni kljuc (binarno)
         */
        $bob_received_alice_public_key = new EncryptionPublicKey(
            new HiddenString(
                sodium_hex2bin($send_to_bob)
            )
        );

        /*
         * Alisa prima Bobov javni kljuc (binarno)
         */
        $alice_received_bob_public_key = new EncryptionPublicKey(
            new HiddenString(
                sodium_hex2bin($send_to_alice)
            )
        );

        /*
         * Alisa kriptuje poruku koju salje Bobu sa Bobovim javnim kljucem i svojim tajnim
         */
        $send_to_bob_cipher_message = Asymmetric::encrypt(
            $alice_message,
            $alice_secret,
            $alice_received_bob_public_key
        );

        /*
         * Bob kriptuje poruku koju salje Alisi sa Alisinim javnim kljucem i svojim tajnim
         */
        $send_to_alice_cipher_message = Asymmetric::encrypt(
            $bob_message,
            $bob_secret,
            $bob_received_alice_public_key
        );

        /*
         * Bob dekriptuje poruku koju mu je Alisa poslala
         */
        $bob_decrypted_message = Asymmetric::decrypt(
            $send_to_bob_cipher_message,
            $bob_secret,
            $alice_public
        );

        /*
         * Alisa dekriptuje poruku koju joj je Bob poslao
         */
        $alice_decrypted_message = Asymmetric::decrypt(
            $send_to_alice_cipher_message,
            $alice_secret,
            $bob_public
        );

        return view('encryption-asymmetric-authenticated', [
            'aliceMessage' => $alice_message,
            'bobMessage' => $bob_message,
            'aliceSecret' => $alice_secret->getRawKeyMaterial(),
            'alicePublic' => $alice_public->getRawKeyMaterial(),
            'bobSecret' => $bob_secret->getRawKeyMaterial(),
            'bobPublic' => $bob_public->getRawKeyMaterial(),
            'bPublicKeySendToAlice' => $send_to_alice,
            'aPublicKeySendToBob' => $send_to_bob,
            'cipherMessageSendToBob' => $send_to_bob_cipher_message,
            'cipherMessageSendToAlice' => $send_to_alice_cipher_message,
            'bob_decrypted_message' => $bob_decrypted_message,
            'alice_decrypted_message' => $alice_decrypted_message
        ]);
    }

    /**
     * @return Application|Factory|View
     * @throws InvalidKey
     */
    public function authenticationSymmetric()
    {
        $message = 'Your message here. Any string content will do just fine.';

        $auth_key = KeyFactory::generateAuthenticationKey();

        // MAC stands for Message Authentication Code
        $mac = Symmetric::authenticate(
            $message,
            $auth_key
        );

        $valid = Symmetric::verify(
            $message,
            $auth_key,
            $mac
        );

        return view('authentication-symmetric', [
            'authKey' => $auth_key->getRawKeyMaterial(),
            'message' => $message,
            'mac' => $mac,
            'valid' => $valid
        ]);
    }

    /**
     * @return Application|Factory|View
     * @throws InvalidSignature
     */
    public function authenticationAsymmetric()
    {
        $message = 'Your message here. Any string content will do just fine.';

        $sign_keypair = KeyFactory::generateSignatureKeyPair();
        $sign_secret = $sign_keypair->getSecretKey();
        $sign_public = $sign_keypair->getPublicKey();

        $signature = Asymmetric::sign(
            $message,
            $sign_secret
        );

        $valid = Asymmetric::verify(
            $message,
            $sign_public,
            $signature
        );

        return view('authentication-asymmetric', [
            'publicSign' => $sign_public->getRawKeyMaterial(),
            'secretSign' => $sign_secret->getRawKeyMaterial(),
            'message' => $message,
            'signature' => $signature,
            'valid' => $valid
        ]);
    }
}
