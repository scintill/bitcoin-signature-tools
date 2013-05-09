.default: verifymessage

# the g++ configurations are based on what bitcoin-qt uses

verifymessage: verifymessage.o key.o
	g++ -O2 -Wall -Wextra -Wformat -Wformat-security -fno-stack-protector -fstack-protector-all -Wstack-protector -D_FORTIFY_SOURCE=2 -o $@ $^ -lcrypto

%.o: %.cpp allocators.h base58.h bignum.h hash.h key.h serialize.h uint256.h util.h
	g++ -c -O2 -Wall -Wextra -Wformat -Wformat-security -fno-stack-protector -fstack-protector-all -Wstack-protector -D_FORTIFY_SOURCE=2 -o $@ $<

clean:
	rm -f *.o verifymessage
