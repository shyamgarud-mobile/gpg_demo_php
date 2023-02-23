### Install the GnuPG extension
#### For Linux
1. Open a terminal window.
2. Type the following command and press Enter:  **`sudo apt-get update`**
4. Type the following command and press Enter: **`sudo apt-get install gnupg`**

#### For macOS:
1. Open Terminal app.
2. Install Homebrew (if it's not already installed) by running the following command: **`/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"`**
3. Type the following command and press Enter: **`brew install gnupg`**

#### For Windows:

1. Download the Gpg4win installer from the official website: **`https://gpg4win.org/`**
2. Run the installer and follow the instructions to install Gpg4win.
3. Once the installation is complete, you should be able to use GnuPG.

After installation, you can test whether GnuPG is installed correctly by running the following command in the terminal or command prompt:
`gpg --version`

### Generating Public and Private Keys
First, you need to generate a public-private key pair. This can be done using a command-line tool like GPG. Here's how to do it:
Go to above project folder and open it in VS code. open Terminal and follow below steps.

1. Generate a new key pair by running the following command: 

	`gpg --gen-key`
	
2. Follow the prompts to configure your key. You'll be asked to enter a name, an email address, and a passphrase.

	`gpg --armor --output public.key --export your@email.com`
	
	Once your key has been generated, you can export your public key to a file:
1. You can also export your private key to a file, but be sure to keep it in a safe place:
	
	`gpg --armor --output private.key --export-secret-key your@email.com`

### To get the keyring from `gpg --list-keys` command, you can use the following steps:
1. Open a terminal or command prompt on your computer.
2. Type `gpg --list-keys` and press Enter. This will list all the keys in your keyring, including the public keys of others and your own public and private keys.
3. Scroll through the output and locate the key you want to use for encryption.
4. Note down the ID of the key, which is a string of letters and numbers that comes after the slash (/) in the output. For example, if the key ID is "12345678", you would note down "12345678".
5. Put above noted key id to the code  for encyption `$gpg->addencryptkey('YOUR_KEYRING_ID_HERE');`
6. For decryption put key ID in `$gpg->adddecryptkey("YOUR_KEYRING_ID_HERE","PASSPHRASE")`
