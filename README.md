# Study Portal

![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/WillTheDeveloper/StudyPortal) ![GitHub](https://img.shields.io/github/license/WillTheDeveloper/StudyPortal) ![Codecov](https://img.shields.io/codecov/c/github/WillTheDeveloper/StudyPortal) ![GitHub issues](https://img.shields.io/github/issues/WillTheDeveloper/StudyPortal) ![GitHub pull requests](https://img.shields.io/github/issues-pr/WillTheDeveloper/StudyPortal) ![GitHub commit activity](https://img.shields.io/github/commit-activity/m/WillTheDeveloper/StudyPortal)

Official Discord server - https://discord.gg/ZEkX2NPWVs

Contact email about anything related to Study Portal: [will@studyportal.cloud](mailto:will@studyportal.cloud)

## About Study Portal

The idea behind Study Portal is to have one platform where students are able to work together on work where other people are doing similar subjects and help each other out.

## Project Roadmap

The full public roadmap is available to everyone. The link to it can be found here. [Study Portal Public Roadmap](https://github.com/orgs/Study-Portal/projects/2/views/1)

Development for this project can sometimes fall behind in regard to keeping up with the roadmap since essentially all the development is done by me and I have a full time job. I will try my best to keep up with the roadmap and keep it up to date. Occasionally people help but nothing significant.

| Q/Year  | Status             | Version     |
|---------|--------------------|-------------|
| Q3 2021 | ✔ Start of project | Alpha       |
| Q4 2021 | ✔ Not recorded     | Alpha       |
| Q1 2022 | ✔ Completed        | Beta        |
| Q2 2022 | ✔ Completed        | Beta        |
| Q3 2022 | ✔ Completed        | Beta        |
| Q4 2022 | ✔ Completed        | Beta        |
| Q1 2023 | ❔ Pending          | Pre-release |
| Q2 2023 | ❔ Planning         | v1.0.0      |
| Q3 2023 | ❔ Planning         | v1.x.x      |
| Q4 2023 | ❔ Planning         | v1.x.x      |

## My goal and original idea

Before we get into the nifty-gritty of the project and my plans for the future, I first wanted to give a little back-story to how the idea came about and the situation that I was in at the time that I had come up with the idea. I am going to assume that you know nothing about me, so I will make sure to leave some pointers. During my time at college, I had to do a work placement and I had actually decided to take part of a work placement where we are all told that it was going to be really difficult, well long story short, it started with 12 people and finished with 2, including myself. During that project, I got exposed to Laravel which is an entire different story and quite a steep learning curve since I had never worked with any frameworks before. You can read about my experience with laravel up to yet [here](https://blog.willthedeveloper.co.uk/2022/02/13/laravel-one-year-later.html).

Anyway, if we fast-forward 12 months, I am finishing my work placement with over 700 hours of industry experience in the bag. At the time of writing this I can't remember what triggered it, but I had this idea to create a platform that allowed students to work together in one way or another. Teams is cool, but I feel like it's tailored more towards a business environment compared to a student environment which is one of the problems I was aiming to solve by developing this application.

But, long explanation, cut short, my primary goals were as follows;
* Create a platform that students could work together in some way to get work done more efficiently.
* Enable collaboration across all levels of study, ranging from college to university.
* Implement additional tools that other applications don't have to ensure that it tailors for students.
* Have something that is open source, so it can be developed over a long time.

## Study Portal features

- Timetable - Place for students to create their own timetable and keep track of what lessons they have.
- Assignments - This is where students can keep track of assignment work that they are doing.
- Dashboard - Overview of all the stats that matter to students.
- Community - Place where students can talk to each other with posts and support each other.
- Kanban - Students being able to have their own personalised kanban to track progress of work or other stuff.
- Calendar - One place where meetings and events can be created and tracked.
- Blog - This is where students and the public will be able to see internal posts from Study Portal team get posted.
- Shop - Somewhere where people can post any items or stationary that may be useful during education. Only ran by Study Portal at the minute.
- Todo - An area where people can keep track of individual tasks that have email updates and reminders connected to them.
- Notes - This is in the name of it, a large inventory and place for students to take notes which supports markdown.
- Groups - This is managed by tutors where they can group students into classes or little teams and manage assignments and other resources for them.
- Reports - The community area of the platform is protected by a report system where admins can take action where necessary of any posts that are harmful to others.
- Institutions - Institutions are like colleges and universities that have subjects and students associated with them to keep everyone under their associated umbrella.
- Placements - Falling under the community area is a placements area where students are able to apply for work placements that may be available to them.
- Applications - This is where students can apply for placements, track the status of their application and employers are able to review their applications.
- Subjects - This is the kind of category system that everything falls under, keeping the entire ecosystem tidy.
- Tags - Kind of like subjects but on a more granular level on a per-user basis but this is entirely optional.
- Resources - A place where students are able to share resources or keep them private amongst themselves, allowing for support amongst students to take place.
- Tickets - These are support tickets that allow students to have a channel where they can get answers for any questions directly from the tutors of their choice.

If you want to see what is happening in more detail than follow this link: https://github.com/users/WillTheDeveloper/projects/5

More features will be added to this list soon. Progress has outpaced the documentation and roadmap a little.

## How to install/run server

### Prerequisites

- We recommend using [docker](https://www.docker.com/products/docker-desktop/) for hosting a local database.
- Have PHP 8 or later installed and setup.
- A database of some kind to develop on.
- Your favourite IDE

### Windows in-depth setup guide

1. Download [Docker](https://www.docker.com/products/docker-desktop/)
2. Setup [WSL2 kernel update](https://docs.microsoft.com/en-us/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package)
3. Setup your [IDE](https://code.visualstudio.com)
4. Download [PHP](https://windows.php.net/download#php-8.1) and place it inside the root of your ```C:``` drive extracted.
5. Enable the following PHP extensions inside the ```php.ini``` file (Further instructions can be found in the file itself):
    - bz2
    - curl
    - ftp
    - fileinfo
    - mbstring
    - mysqli
    - openssl
    - pdo_mysql
    - pdo_pgsql
    - pdo_sqlite
    - pgsql
    - shmop
6. Install [composer](https://getcomposer.org/download/) using the Windows installer found at the top of the page.
7. Download the ```.msi``` installer for windows, using the LTS version of [Node](https://nodejs.org/en/download/).
8. Decide what you want to call your project. We will refer to it now as ```$project```.
9. Initialise a project by running ```composer create-project laravel/laravel $project``` in powershell.
10. Enter the directory of your new project via powershell by running ```cd ./$project```
11. Install composer packages by running ```composer install```
12. Install NPM packages by running ```npm install```
13. Setup environment file by running ```cp .env.example .env```
14. Generate your application key: ```php artisan key:generate```
15. Open docker desktop and wait till it has initialised.
16. Run this command in command line: ```docker pull postgres``` then run ```docker pull dpage/pgadmin4```
17. Inside docker, navigate to ```images``` tab on the left and find postgres in the list.
18. Hover your mouse over ```postgres``` and press the ```run``` button located to the right of it.
19. In the menu, dropdown the section which says ```optional settings``` and enter the following information:
    - ```container name``` - Give the container a name, this can just be ```postgres```
    - ```ports``` - Give the container a port which you will use to access the container, this can just be ```5432``` which is the default.
    - In the environment variables section create the following:
        - ```POSTGRES_PASSWORD``` - Set this as the variable then in the value, create a no-space password which you will use to access the database.
20. Press ```run``` to start the postgres server.
21. If you are connecting your application to a database, add the URL and credentials to ```.env```:
    - ```DB_HOST``` - Using docker, this would just be ```localhost```.
    - ```DB_CONNECTION``` - In this example, we use postgres so ```pgsql``` would go here.
    - ```DB_PORT``` - This would be whatever you set as the port on docker when you created the container.
    - ```DB_DATABASE``` - Name of the database that we will be creating.
    - ```DB_USERNAME``` - For this example, this is simply ```postgres```.
    - ```DB_PASSWORD``` - Whatever you set the docker container environment variable to.
22. Run ```php artisan migrate``` to set up the database with any migrations that you might have.
23. Compile assets by ```npm run dev```
24. Start the server: ```php artisan serve```
25. Visit your server on http://localhost:8000

*You may get an error about a missing .env file which I do not source control since it has credentials in it.*

## Versioning

This repository follows semantic versioning: MAJOR . MINOR . PATCH.

The versioning has been introduced into the repository a bit late but has now been implemented and will be used from now on.

- [X] Alpha (Not part of versioning)
- [ ] Beta (Currently in Beta)
- [X] Public Beta Testing
- [ ] Initial release (31st April 2023)

## Testing

Testing should be completed and successful before accepting any pull requests into the repository.

Tests can be run via the command line using the following command in the root directory of the project:

```
php artisan test
```

Tests can be located inside ```/tests/feature/``` directory.

## Notifications

Study Portal will have a lot of cross application notification integration that initially will be heavily based around JSON webhooks.

Below are a list of methods that you will be able to receive notifications:

- [ ] Microsoft Teams - This has been requested upon some feedback that I received and made it clear that it would be quite a good idea and an alternative way to get into contact with students regarding any new assignments that they may have.
- [ ] Email - This would be one of the main ways of notifying students of updates on the platform that would be targeted towards them.
- [ ] Text message - I aim for this to be one of the other notifying channels that most of the students would use since I am assuming that most students would have phones that they can check when they get a notification.
- [X] Discord - This is the main notification channel for testing initially but could be used on a wider scope on a per-person basis but would require webhook relationships with users which is not a thing yet. Further investigation is required for this.
- [ ] Twitter - This might not make it to the final release since I cannot see it being used.

*Suggestions are welcome for other notification channels but would need some sort of justification.*

## Issue tracking

*I am still yet to create the templates for issues*

If you come across any issues on the website that is causing you problems, please take a moment to either email me if you do not have a GitHub account and choose not to create one or feel free to create an issue on this repository which will be reviewed and looked into resolving. You may be asked for further details on it or how to recreate the issue so please make sure to check your GitHub notifications a few days after you submit the issue. You can email me at: *willthedeveloper13@gmail.com*.

You can do this in the issues tab. If you are not sure of where this is then here is a link - https://github.com/WillTheDeveloper/StudyPortal/issues

## Feature suggestions

- If you have the skills to build it yourself then you should create a pull request with it. If you need some information or anything that is database related then contact me directly.
- If you would just like to suggest something then, create a discussions page, and we can look into implementing it.

## Contribute to Study Portal

You can contribute to this repository by forking it, making the changes that you want and then placing a pull request with all the details of what you have changed/added/deleted. Any questions, please visit my profile and email me.

## What does it look like at the moment?

**PLEASE NOTE THAT THIS IS STILL IN BETA AND IS NOT THE FINAL PRODUCT.....YET**

### User dashboard

![image](https://user-images.githubusercontent.com/78596837/206759763-73ced16a-8396-48b8-8700-cb50f1657e27.png)

### User Timetable

*Not fully populated*

![image](https://user-images.githubusercontent.com/78596837/206759917-83081487-aa6b-4ce2-a3ee-d83f1cc85031.png)

### User Assignments

*Empty*

![image](https://user-images.githubusercontent.com/78596837/206759998-b1bd2f92-0a37-4371-83c1-fa2c5af367d0.png)

### User calandar

![image](https://user-images.githubusercontent.com/78596837/206760045-33b3f3c4-df59-4314-a495-bc31a407d8f6.png)

### User Kanban

![image](https://user-images.githubusercontent.com/78596837/206760099-2c1d540e-d1b8-4368-befa-27f0d52984a0.png)

### User Todo lists

![image](https://user-images.githubusercontent.com/78596837/206760137-052cf2c0-c5a4-4696-aa61-4836210e79dc.png)

### User Notes section

![image](https://user-images.githubusercontent.com/78596837/206760197-53bfae57-89ec-4105-b87f-67a20af67ea5.png)

### Tutor Group management

![image](https://user-images.githubusercontent.com/78596837/206760273-cc734875-7f6a-47ba-b44e-2f6cece1b1b3.png)

### Admin User Management

![image](https://user-images.githubusercontent.com/78596837/206760439-ba5c4b70-7b65-45d1-8f2e-5cbf456c3c39.png)

### Admin Report Overview

![image](https://user-images.githubusercontent.com/78596837/206760507-87545778-56a0-4e26-bff2-ff1dcebb326d.png)

### Institution management area

![image](https://user-images.githubusercontent.com/78596837/206760571-1de1d71e-bde4-42da-99c5-684bfd30d5b6.png)

### Community home page

![image](https://user-images.githubusercontent.com/78596837/206760621-4fd250da-4539-4dcc-b173-2e0458c0bd15.png)

### Community communities area

![image](https://user-images.githubusercontent.com/78596837/206760697-82f81c9c-a3f2-4c1e-a8c9-f9dd9ce3ad9e.png)

### Community placements page

![image](https://user-images.githubusercontent.com/78596837/206760756-5fafb028-d573-438b-a17c-c883a397be22.png)

### Student applications management page

![image](https://user-images.githubusercontent.com/78596837/206760812-23df4fa7-6d07-4490-8c64-3e31d8b9ce2a.png)

### User's resources page

![image](https://user-images.githubusercontent.com/78596837/206760860-ec75ad45-14f2-4c12-aa89-2c5dde6c05bd.png)

### Tutor's incoming tickets page

![image](https://user-images.githubusercontent.com/78596837/206760918-b6c19086-c866-479d-b32d-8ee28ba49e23.png)

### User profile management page

![image](https://user-images.githubusercontent.com/78596837/206760988-809b825c-430c-4585-8c83-0cd989721675.png)

