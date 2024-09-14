# AutoMVC-Generator
Als Laravel-Entwickler solltest du deinen Arbeitsplan mit der Erstellung von Migrationen, Models, Controllern und Views (sowohl für Front- als auch Backend) beginnen. Wie alle Fachleute wissen, dauert dieser Vorgang viel Zeit. Darüber hinaus muss man sich gut konzentrieren, um sauberen Code zu gewährleisten.
Aus diesen Gründen habe ich dieses Software-Werkzeug erstellt, mit dem du nicht nur deine Arbeit vereinfachen, sondern auch Zeit sparen kannst. Die Idee besteht darin, Migrationen, Models, Controller und Views zu erstellen, sobald eine Tabelle in der Datenbank erstellt wird. Es bietet auch die Möglichkeit, die Tabelle in der Datenbank zu erstellen, was ebenfalls Zeit spart.
Auf einer einzigen Webseite kannst du Folgendes tun:
1.	Tabelle in der Datenbank erstellen.
2.	Migration dafür erstellen.
3.	Model dafür erstellen.
4.	Controller für API und Blade erstellen.
5.	Views nur für den Admin-Bereich der Webseite erstellen.
6.	Routen für API und Web erstellen.
Du kannst auch bestimmen, welche Funktionen du in diesem Controller benötigst. Aber wie weiß dieses Werkzeug, welche Funktionen du für den Controller benötigst?
Du musst die Funktionen im Verzeichnis „AutoMVCGenerator\app\Functions“ schreiben, wobei jede Funktion eine eigene Datei hat. Beachte dabei, dass die Dateinamen im "CamelCase"-Format geschrieben werden müssen. So hast du viele Funktionen zur Auswahl und kannst einfach die auswählen, die du benötigst.
Ich habe den Code in gutem Zustand geschrieben.
Die View, die für die Erstellung der Webseite zuständig ist, befindet sich im Verzeichnis: AutoMVCGenerator\resources\views\admin\Creator-page.
Der Hauptcontroller befindet sich im Verzeichnis: AutoMVCGenerator\app\Http\Controllers\PageGeneratorController.php.
Ich habe auch in einigen Situationen ChatGPT eingesetzt, damit ich schneller abschließen kann.
Vielen Dank für Ihre Zeit.
