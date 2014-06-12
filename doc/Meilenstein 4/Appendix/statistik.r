setwd("/home/sandra/Universität/UniWien/4S_SS2014/Human Computer Interaction und Psychologie/GitMeilensteine/hci/doc/Meilenstein 4/Appendix/")
daten <- read.csv2("daten.csv", header=TRUE, sep=";")

daten[,5]

# Two-Sample T-Test (Zeit - Aufgabe 1)
t.test(daten[,2],daten[,5], var.equal=TRUE, paired=FALSE)
