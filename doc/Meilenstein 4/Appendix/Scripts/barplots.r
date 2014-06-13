titel <- c("Einfach", "Menschlich", "Verständlich", "Übersichtlich", "Innovativ", "Kreativ", "Schön", "Fröhlich")
beschriftung <- c("Mitteilungsblatt", "Univis", "eCurriculum")

for (i in 1:8) {
  png(filename=paste("barplot", i, ".png", sep=""))
  barplot(c(mean(daten[[7+i]]), mean(daten[[15+i]]), mean(daten[[23+i]])), names=beschriftung, main=titel[i])
  dev.off()
}