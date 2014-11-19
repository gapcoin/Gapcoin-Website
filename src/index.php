<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gapcoin</title>
    <meta name="author" content="Jonny Frey">
    <meta name="description" content="A new scintific cryptocurrency which proof-of-work is based on searching for prime gaps.">
    <meta name="keywords" content="Gapcoin prime gaps cryptocurrency">

    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-160x160.png" sizes="160x160">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rokkitt">
    <link rel="stylesheet" type="text/css" href="./styles.css" />
  </head>

  <body> 

    <div id="caption">
      <?php include("./caption.php") ?>
    </div>

    <div id="navigation">
      <?php include("./navigation.php") ?>
    </div>

    <div id="body_div">
      <div id="artikel">
        <h2> What is Gapcoin? </h2>
        <p>Gapcoin is a new prime number based p2p cryptocurrency, 
           which tries to eliminate the sticking points of other 
           scientific currencies like Primecoin or Riecoin.
           <br>
           It's a fork of Satoshi Nakamotos Bitcoin, a decentralized 
           payment system which is independent of banks, governments 
           and other centralized regulators.
           <br>
           With Gapcoin, you will be able to anonymously send 
           money around the globe in no time.
        </p>
        <p>The big improvement in comparison to Bitcoin is that 
           instead of burning electricity for its own sake, 
           Gapcoins Proof of Work function actually does useful work 
           by searching for large prime gaps.
        </p>
        <p>&nbsp;</p>
        <h3>Specifications:</h3>
        <ul>
          <li>PoW: custom, prime gaps</li>
          <li>Block target time 2.5 minutes</li>
          <li>Block reward proportional to the current difficulty</li>
          <li>Block reward halving every 420000 (about 2 years)</li>
          <li>Cap: about 10 - 30 million GAP</li>
          <li>Difficulty adjusts every block and increases logarithmically (it will probably take years to get to 50)</li>
        </ul>
        <p>&nbsp;</p>
        <h3>Fair launch:</h3>
        <ul>
          <li>Gapcoin was not designed to enrich the early adopters 
              or the coin creators! Unlike Primecoin, the more people 
              mine Gapcoin, the more coins per block will be produced. 
              (Coin supply will increase logarithmically with the difficulty, 
              this means it will grow in the beginning, but later, it won't change much.)
          <li>There won't be any premine!</li>
          <li>To avoid instamine, the reward of the first 1152 blocks (about 48 hours)
              will increase quadratically to its absolute value: the current difficulty. 
              Block reward will be 1/1152^2&nbsp;*&nbsp;blockheight^2&nbsp;*&nbsp;difficulty for the first 1152 blocks. 
          <li>Source code will be available before launch (excluding the PoW function), 
              so everyone can setup their own environment, 
              compile the software, and check if everything works.</li>
          <li>Windows and Linux binaries will be distributed in an encrypted container 
              before launch, the password will be revealed at launch.</li>
        </ul>
        <p>&nbsp;</p>
        <h3>What are the advantages of Gapcoin compared with other prime number based cryptocurrencies?</h3>
        <p>First of all, Gapcoin follows Riecoin's way and uses enough Miller-Rabin 
           tests with random bases to avoid composite numbers being accepted as 
           Prove of Work, like Primecoin mistakenly could.
        </p>
        <p>But the real improvement is due to its easy “pool-mineable” Hashing algorithm.
           <rb>
           This means that creating a Gapcoin pool will be as easy as creating a scrypt one!
        </p>

          <h4>Why is that important?</h4>
          <p>When you look at Riecoin, there are only two pools. Even Primecoin, 
             the first scientific cryptocurrency, only has three reliable pools.
             <br>
             This is due to the difficulty of creating a fair reward system for 
             the custom hashing algorithms of Prime- and Riecoin.
          </p>
          <p>In Primecoin, which is searching for long prime chains, you can 
             easily modify your miner to search for smaller chains. In fact, 
             it is mostly about a simple one-line-editing.
             As an example, just turn a 10 into a 7 in 
             <a href="https://github.com/thbaumbach/primecoin">xolominer</a> 
             and you will get scads of 7-chains, but your chance to find a 
             block has diminished.
             <br>
             To avoid this, pools supply better payment for shares with longer chain-lengths.
          </p>
          <p>In Riecoin, it is even worse. Riecoin searches for prime tuples of length 6. 
             Pools do accept tuples with less primes, but a 6-tuple only can occur in 
             certain places. (Look at 
             <a href="http://da-data.blogspot.de/2014/03/fast-prime-cluster-search-or-building.html">this</a>
             post for a detailed explanation.)
             <br>
             4-tuples, by comparison, are more frequent. There are places, 
             where a 4-tuple can occur, but no 6-tuple, which Riecoin truly needs. 
             So pools have to check every submitted share whether the miner really searches 
             for 6-tuples or not. 
             <br>
             Those facts are what make it so hard to create a Prime- or Riecoin pool.
          </p>
          <p>With Gapcoin, there won't be any problems like these. While in Riecoin 
             and Primecoin you can choose whether to search for bigger shares or smaller 
             ones, Gapcoin is searching for prime gaps in general. The distribution 
             of prime gaps is still a mystery for mathematicians, that's why you 
             can't modify your miner to look for special results. Consequently, 
             every submitted share can be paid equally. 
          </p>
          <p>&nbsp;</p>
          <h3>How is Proof of Work actually designed?</h3>
          <p>A PoW algorithm has to fit two specifications:</p>
          <ul>
            <li>It must be cryptographically secure (a PoW must not be reusable)</li>
            <li>It must be hard to calculate, but easy to verify</li>
          </ul>
          <p>Verifying a prime gap is easy, you only have to check every 
             number between the start and the end to be composite.
          </p>
          <p>Calculating is harder, much harder!
             <br>
             Large prime gaps occur a lot lesser than smaller ones. According to 
             <a href="http://primerecords.dk/primegaps/gaps20.htm">E.&nbsp;Westzynthius</a>,
             in e^n prime gaps there will be one gap that is n times greater than the average prime gap.
          </p>
      
          <h4>So the difficulty will simply be the length of the prime gap?</h4>

          <p>Not exactly. The average length of a prime gap with the starting
             prime p, is log(p), which means that the average prime gap size 
             increases with lager primes.
             <br>
             Then, instead of the pure length, we use the merit of the prime gap, 
             which is the ratio of the gap's size to the average gap size.
          </p>
          <p>Let p be the prime starting a prime gap, then m&nbsp;=&nbsp;gapsize/log(p) 
             will be the merit of this prime gap.
          </p>
          <p>Also a pseudo random number is calculated from p to provide finer 
             difficulty adjustment.
          </p>
          <p>Let rand(p) be a pseudo random function with 
             0&nbsp;&#x3c;&nbsp;rand(p)&nbsp;&#x3c;&nbsp;1
             <br>
             Then, for a prime gap starting at prime p with size s, the 
             difficulty will be s/log(p)&nbsp;+&nbsp;2/log(p)&nbsp;*&nbsp;rand(p), where 2/log(p) 
             is the average distance between a gap of size s and s&nbsp;+&nbsp;2 
             (the next greater gap) in the proximity of p.
          </p>
          <p>When it actually comes to mining, there are two additional fields 
             added to the Blockheader, named “shift” and “adder”.
             <br>
             We will calculate the prime p as sha256(Blockheader)&nbsp;*&nbsp;2^shift&nbsp;+&nbsp;adder.
             <br>
             As an additional criterion the adder has to be smaller 
             than 2^shift to avoid that the PoW could be reused.
          </p>
        <p>&nbsp;</p>
        <h3>Could we break any world records?</h3>
        <p>Sure, if the difficulty reaches 35.4245, every block will be a 
           new world record: <a href="http://primerecords.dk/primegaps/gaps20.htm">
           Top&nbsp;20&nbsp;Prime&nbsp;Gaps</a>
        </p>
        <h4>But how are prime gaps useful?</h4>
        <p>Prime numbers are interesting for lots of mathematicians 
           around the globe, and they're also important to every day cryptography 
           (see <a href="https://en.wikipedia.org/wiki/RSA_%28cryptosystem%29">
           RSA</a>).
        </p>
        <p>Researches about prime gaps could not only lead to new breakthroughs in the 
           <a href="http://www.simonsfoundation.org/quanta/20131119-together-and-alone-closing-the-prime-gap/">
           bounded gap</a>, it may also help proving the 
           <a href="http://online.sfsu.edu/meredith/301/Papers/KazakoffTwinPrimeConjectureMath301.pdf">
           Twin Prime Conjecture</a> and maybe even the millennium problem, the 
           <a href="https://en.wikipedia.org/wiki/Riemann_hypothesis">
           Riemann hypothesis</a>. Who knows?
        </p>
        <p>&nbsp;</p>
        <h3>Last but not least, what does the logo have to do with prime gaps?</h3>
        <p>Well, the “G” was already taken by Goldcoin, so that was no possibility.
           <br>
           But the formula &pi;(x) is known as the prime-counting function, 
           which graph shows the prime gap distribution as well. 
           That's why the “&pi;” fits the logo perfectly. (image Wikipedia)
        </p>
        <a href="https://en.wikipedia.org/wiki/Prime-counting_function">
          <img src="./img/prime-counting-function.png"
               width="540" 
               height=317">
        </a>
      </div>
      <?php include("./info.php"); ?>
    </div>
  </body>
</html>
