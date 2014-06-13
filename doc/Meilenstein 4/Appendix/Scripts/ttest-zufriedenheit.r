meansAlt <- rowMeans(daten[8:23])
meansNeu <- rowMeans(daten[24:31])
t.test(meansAlt, meansNeu, alternative="greater")