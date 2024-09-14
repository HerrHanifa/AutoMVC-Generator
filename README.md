# AutoMVC-Generator
Deutsch:
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

Englich:
As a Laravel developer, you should start your workflow by creating migrations, models, controllers, and views (for both frontend and backend). As professionals know, this process takes a lot of time. Moreover, you need to focus well to ensure clean code. For these reasons, I have created this software tool, which not only simplifies your work but also saves you time. The idea is to create migrations, models, controllers, and views as soon as a table is created in the database. It also offers the possibility to create the table in the database, which further saves time. On a single webpage, you can do the following:

Create a table in the database.
Create a migration for it.
Create a model for it.
Create a controller for API and Blade.
Create views only for the admin area of the website.
Create routes for API and web.
You can also specify which functions you need in this controller. But how does this tool know which functions you need for the controller? You need to write the functions in the directory „AutoMVCGenerator\app\Functions“, with each function having its own file. Note that the filenames must be written in "CamelCase" format. This way, you have many functions to choose from and can easily select the ones you need. I have written the code in good condition. The view responsible for creating the webpage is located in the directory: AutoMVCGenerator\resources\views\admin\Creator-page. The main controller is located in the directory: AutoMVCGenerator\app\Http\Controllers\PageGeneratorController.php. I have also used ChatGPT in some situations to finish more quickly. 
Thank you for your time.

