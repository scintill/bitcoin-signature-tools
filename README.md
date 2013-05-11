# bitcoin-signature-tools

Simple standalone tool(s) for Bitcoin message signatures, currently only verifying of signatures from [the reference Bitcoin client](https://github.com/bitcoin/bitcoin) ("bitcoin-qt").  It is derived from the code of bitcoin-qt.

I may add support for creation of signatures or other signature formats.  Please open an issue if you're interested in these.

## Dependencies and Building

The only library this depends on is OpenSSL.  On Ubuntu or similar systems, the following should be sufficient to install dependencies and build:

    sudo apt-get install build-essential libssl-dev
    make

The [bitcoin-qt documentation](https://github.com/bitcoin/bitcoin/tree/master/doc) may be helpful in installing dependencies for your system.  You don't need the databases, Boost, or miniupnp, only OpenSSL and the GNU toolchain.

## Usage

Please see [tests/verifymessage](https://github.com/scintill/bitcoin-signature-tools/tree/master/tests/verifymessage) for examples of how to use the verifymessage tool from a shell script.

## Security

These tools may not protect in-memory data as well as bitcoin-qt does (from leaking after free, or being paged-out.)  For now I don't think this is a problem since there are no secrets being handled.

Remember that arguments passed on a process' command line are visible to local users in most UNIX systems, so make sure you trust all local users enough, or adjust the programs to take arguments another way.
