# bitcoin-signature-tools

Simple standalone tool(s) for Bitcoin message signatures, currently creating and verifying signatures in the format of the [the reference Bitcoin client](https://github.com/bitcoin/bitcoin) ("bitcoin-qt").  It is derived from the code of bitcoin-qt.

I may add support for other signature formats.  Please open an issue if you're interested in these.

## Security

These tools don't protect in-memory data as well as bitcoin-qt does (from being reused after free, or being paged-out.)  This is for simplicity, and because I don't know enough to feel comfortable saying I've taken precautions for you.

**Remember that arguments passed on a process' command line are visible to local users in most UNIX systems, so make sure you trust all local users enough, or adjust the programs to take arguments another way.**  This is especially relevant for creating signatures!

## Dependencies and Building

The only library this depends on is OpenSSL.  On Ubuntu or similar systems, the following should be sufficient to install dependencies and build:

    sudo apt-get install build-essential libssl-dev
    make

The [bitcoin-qt documentation](https://github.com/bitcoin/bitcoin/tree/master/doc) may be helpful in installing dependencies for your system.  You don't need the databases, Boost, or miniupnp, only OpenSSL and the GNU toolchain.

## Usage

Please see the scripts in [tests/](https://github.com/scintill/bitcoin-signature-tools/tree/master/tests/) for examples of how to use the tools from shell scripts.
