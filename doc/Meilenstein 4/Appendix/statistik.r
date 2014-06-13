setwd("/home/reiko/Universität/Uni Wien/4S(SS2014)/Human Computer Interaction und Psychologie/GitMeilensteine/hci/doc/Meilenstein 4/Appendix/")
daten <- read.csv2("daten.csv", header=TRUE, sep=";")
attach(daten)

### Deskriptive Statistik ###

# Boxplot

boxplot(a1_mb, a1_ec, names=c("Mitteilungsblatt", "eCurriculum"), main="Zeit in Sekunden für die 1. Aufgabe") 

boxplot(a2_mb, a2_ec, names=c("Mitteilungsblatt", "eCurriculum"), main="Zeit in Sekunden für die 2. Aufgabe")  

boxplot(a3_uv, a3_ec, names=c("Univis", "eCurriculum"), main="Zeit in Sekunden für die 3. Aufgabe")  

# Two-Sample T-Test (Zeit - Aufgabe 1)
t.test(daten[,2],daten[,5], var.equal=TRUE, paired=FALSE)
