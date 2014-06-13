setwd("/home/reiko/Universität/Uni Wien/4S(SS2014)/Human Computer Interaction und Psychologie/GitMeilensteine/hci/doc/Meilenstein 4/Appendix/")
daten <- read.csv2("daten.csv", header=TRUE, sep=";")
attach(daten)

### Inferenzstatistik ###

# Two-Sample T-Test (Zeit - Aufgabe 1)
t.test(a1_mb, a1_ec, alternative="greater")

# Two-Sample T-Test (Zeit - Aufgabe 2)
t.test(a2_mb, a2_ec, alternative="greater")

# Two-Sample T-Test (Zeit - Aufgabe 3)
t.test(a3_uv, a3_ec, alternative="greater")
