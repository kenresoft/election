# election (simple website)

This activity includes a report on the designed database-driven website's functionalities, its description, and a walkthrough.
The site is entirely responsive and user-friendly, with capabilities exclusive to the domain. It basically pulls data from a relational database and displays it in HTML format.

## 2.1 WEBSITE 
URL <https://localhost/election>

## 2.2 SERVER MACHINE
XAMPP (Windows)

## 2.3 LANGUAGES/SCRIPTS
- HTML
- Bootstrap CSS
- Material CSS
- JavaScript
- jQuery
- Ajax
- PHP
- MySQL

## 2.2 WORKTHROUGH OF WEBSITE
There are a total of ten pages on this website. On mobile and tablet devices, it has a navigation bar and a navigation button to toggle this bar. It does not contain any links to third-party websites or pages; thus, all pages can be seen without a working internet connection.
In summary, this website, as the title reads, is an election site for storage of electoral data, casting of votes, registration of voters and display of electoral data from an election database.
One of the most important pages in this site in the page for casting a vote (<http://localhost/election/cast_vote.php>). From this particularly page either or both a candidate (contesting for a particular position) and an electorate (not contesting for any position – persons who have identified to participate in the electoral process of voting). From this page, when a voter (both candidate and electorates now) votes, the vote data is being saved and stored in the election database. Also, only registered voters all permitted to cast a vote on the site.
Saved votes made from the website can be viewed from the votes page (<http://localhost/election/votes.php>) which displays all already inserted votes data and current votes by the user.

### 2.2.1 PAGES

#### A. LANDING PAGE

This is the first page and home page which displays first when the site is opened on a web browser. In a nutshell, it tells the viewer what the website is all about. On clicking the “Get Started” the site takes us to the “registration.php” which is the registration page.

- URL: <http://localhost/election/>

#### B. REGISTRATION PAGE
This is the first page that comes up after the landing page. It contains a list of all registration data. It fetches data from the registration table in the database.

- URL: <http://localhost/election/registrations.php>

#### C. CANDIDATES’ PAGE
This page loads all the candidates’ information according to their ids. It fetches its data from the candidates table in the database.

- URL: <http://localhost/election/candidates.php>

#### D. ELECTORATES’ PAGE
This page loads all the candidates’ information according to their ids. It fetches its data from the candidates table in the database.

- URL: <http://localhost/election/electorates.php>

#### E. POLITICAL PARTIES PAGE
This page loads all the information about the available political parties. By default, there are only 3 political parties as stored in the database. It fetches its data from the parties table in the database.

- URL: <http://localhost/election/parties.php>

#### F. CONTESTABLE POSITIONS PAGE
This page loads all the electoral positions that can be contested for in the election according to their ids. By default, there only 5 positions: President, Secretary, Financial Secretary, Provost, and Public Relations Officer (PRO). It fetches its data from the positions table in the database.

- URL: <http://localhost/election/positions.php>

#### G. VOTING PAGE
This page actually allows data to be written to our database unlike the other pages that only reads data from it. It uses Ajax and jQuery scripts to fetch the value of registered voters once a category type is selected. It fetches its data from the parties and positions table in the database.

- URL: <http://localhost/election/cast_vote.php>

#### H. LOCATION PAGE
This page loads all the available locations where the election is acknowledged to take place. Also from these locations, we get to determine the various office locations of the different parties participating in the election. It fetches its data from the locations table in the database.
URL: <http://localhost/election/locations.php>

#### I. POLLING UNITS PAGE
This page loads all the polling units where the voters are to gather to cast their votes. Each polling unit is unique to the electorates and can be found inside any of the different locations identified for the election. It fetches its data from the units and locations table in the database.

- URL: <http://localhost/election/units.php>

#### J. ALL VOTES PAGE
This page loads all the votes that has been made during the election. The vote information is arranged according to the vote ids (depending on when the vote was made). It fetches its data from the votes, positions, parties, categories and registrations table in the database.

- URL: <http://localhost/election/votes.php>
