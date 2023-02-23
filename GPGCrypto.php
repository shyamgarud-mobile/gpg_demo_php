<?php 

use \gnupg;
class GPGCrypto
{
    public function encryptFile()
    {
        $gpg = new gnupg();   
        $gpg->import('./public.key'); 
        $gpg->addencryptkey('270EB67702EB456E83712B12ECC542D29D5DC562');        
        $encryptedData = $gpg->encrypt(file_get_contents('./data.txt'));       
        if ($encryptedData === false) {
            $error = $gpg->geterror();                  
            echo $error;
            
        } else {

            file_put_contents('./encrypted.txt', $encryptedData);
        }
    }
    public function decryptFile()   
    {
        $gpg = new gnupg();
        $gpg->import('./public.key');  
        $gpg->adddecryptkey("270EB67702EB456E83712B12ECC542D29D5DC562","Avatar2023@");      
        $decrypted_data = $gpg->decrypt(file_get_contents('./encrypted.txt'));
        file_put_contents('./decrypted.txt', $decrypted_data);

        if ($decrypted_data === false) {
            $error = $gpg->geterror();                  
            echo $error;
        } 
    }
    
}

$gpgCrypto = new GPGCrypto();
$gpgCrypto->encryptFile();
$gpgCrypto->decryptFile();
?>