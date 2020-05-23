# News site

**Installation:**
 1. Copy the `news_site` folder to the wamp server's `www` folder
 2. Create the database based on the `news_site\database\create.sql` file
 3. Inside the `news_site\application\config\database.php` change the `hostname` port number of your MySql server if needed
 4. Go to [http://localhost/news_site/](http://localhost/news_site/)

If You created the database based on the `create.sql` You should have some base value and an user with the following datas:
|Email|Password  |
|--|--|
| admin@admin.hu | admin123 |

**Site features:**

 - Login and registration
 - Category management with admin user (access from navbar)
 - Save news to Json file either with the file names or with images converted to Base64 format
 - Upload news using a .txt file which contains the text of the news
 - Showing news with search options
