#include <stdio.h>
#include <string>
#include <vector>
using namespace std;

#include "util.h"
#include "base58.h"

bool fTestNet = false;
const string strMessageMagic = "Bitcoin Signed Message:\n"; // from main.cpp

int main(int argc, char *argv[]) {
    if (argc != 3) {
        fprintf(stderr,
            "signmessage <base58privatekey> <message>\n\n"
            "Sign a message using a Bitcoin private key.\n");
        return 255;
    }

    string strSecret = argv[1];
    string strMessage = argv[2];

    CBitcoinSecret vchSecret;
    bool fGood = vchSecret.SetString(strSecret);

    if (!fGood) {
        printf("Private key is not good\n");
        return 1;
    }

    CKey key;
    bool fCompressed;
    CSecret csecret = vchSecret.GetSecret(fCompressed);
    key.SetSecret(csecret, fCompressed);

    CHashWriter ss(0);
    ss << strMessageMagic;
    ss << strMessage;

    vector<unsigned char> vchSig;
    if (!key.SignCompact(ss.GetHash(), vchSig)) {
        printf("Sign failed\n");
        return 1;
    }

    printf("%s\n", EncodeBase64(&vchSig[0], vchSig.size()).c_str());

    return 0;

}

