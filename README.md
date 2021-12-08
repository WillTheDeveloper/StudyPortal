# Study Portal

Official Discord server - https://discord.gg/ZEkX2NPWVs

## Concept behind Study Portal

The idea behind Study Portal is to have one platform where students are able to work together on work where other people are doing similar subjects and help each other out.

## Study Portal features

*Tick means it has been finished*

- [ ] Timetable - Place for students to create their own timetable and keep track of what lessons they have.
- [X] Assignments - This is where students can keep track of assignment work that they are doing.
- [X] Dashboard - Overview of all the stats that matter to students.
- [ ] Community - Place where students can talk to each other with posts and support each other.
- [ ] Kanban - Students being able to have their own personalised kanban to track progress of work or other stuff.
- [ ] Calandar - This idea is still **provisional** but it will be a calander where events can be created for things such as meetings.

If you want to see what is happening in more detail than follow this link: https://github.com/users/WillTheDeveloper/projects/5

## Versioning

This repository follows semantic versioning: MAJOR . MINOR . PATCH.

The versioning has been introduced into the repository a bit late but has now been implemented and will be used from now on.

- [X] Alpha (Not part of versioning)
- [ ] Beta (Partially part of versioning, read release notes)
- [ ] Public Beta Testing (Planned for 1st January 2022)
- [ ] Initial release (Date TBD)

## Notifications

Study Portal will have a lot of cross application notification intergration that initially will be heavily based around JSON webhooks.

Below are a list of methods that you will be able to recieve notifications:

- [ ] Microsoft Teams - This has been requested upon some feedback that I received and made it clear that it would be quite a good idea and an alternative way to get into contact with students regarding any new assignments that they may have.
- [ ] Email - This would be one of the main ways of notifying students of updates on the platform that would be targetted towards them.
- [ ] Text message - I aim for this to be one of the other notifying channels that most of the students would use since I am assumuming that most students would have phones that they can check when they get a notification.
- [X] Discord - This is the main notification channel for testing initially but could be used on a wider scope on a per person basis but would require webhook relationships with users which is not a thing yet. Further investigation is required for this.
- [ ] Twitter - This might not make it to the final release since I cannot see it being used.

*Suggestions are welcome for other notification channels but would need some sort of justification.*

## Issue tracking

*I am still yet to create the templates for issues*

If you come across any issues on the website that is causing you problems, please take a moment to either email me if you do not have a Github account and choose not to create one or feel free to create an issue on this repository which will be reviewed and looked into resolving. You may be asked for further details on it or how to recreate the issue so please make sure to check your Github notifications a few days after you submit the issue. You can email me at: *willthedeveloper13@gmail.com*.

You can do this in the issues tab. If you are not sure of where this is then here is a link - https://github.com/WillTheDeveloper/StudyPortal/issues

## Feature suggestions

- If you have the skills to build it yourself then you should create a pull request with it. If you need some information or anything that is database related then contact me directly.
- If you would just like to suggest something then, create a discussions page, and we can look into implementing it.

## Contribute to Study Portal

You can contribute to this repository by forking it, making the changes that you want and then placing a pull request with all the details of what you have changed/added/deleted. Any questions, please visit my profile and email me.

## What does it look like at the moment?

**PLEASE NOTE THAT THIS IS NOT THE FINAL DESIGN AND IS SUBJECT FOR A OVERHAUL REDESIGN AND IS JUST SHOWING A CONCEPT**

Here are some images of the fundamental structure of the application at the minute.

### Student Dashboard

**UPDATE - THIS PAGE IS CURRENTLY HAVING AN HEAVY REDESIGN**

You can preview this redesign on a different branch linked here - https://github.com/WillTheDeveloper/StudyPortal/tree/redesigned-backend

On this page, students will be able to get an overview of what is happening.

![image](https://user-images.githubusercontent.com/78596837/144643845-79159886-2273-4514-b8c7-34bc3d6a379c.png)

### Student Timetable

This is where students will be able to view their timetables and edit them if they need to. They will also be able to create their own if they have not been assigned one. Currently, this is still a work in progress.

![image](https://user-images.githubusercontent.com/78596837/144643904-054571a0-73e8-4a9c-8bbe-cca319096783.png)

### Student Assignments

This is where students will be able to view all the assignments they have. Which will be followed by an image of where students can view their assignment details.

![image](https://user-images.githubusercontent.com/78596837/144643958-f0054008-a4eb-468e-a242-bb3586da5328.png)

### Student Kanban (New feature)

This is where students will be able to create their own kanban boards to allow them to organise tasks and work into groups for themselves.

![image](https://user-images.githubusercontent.com/78596837/144643998-7114bbe2-199d-4b00-90db-be85ab0f098b.png)

Details view of the kanban board. **Still in early development.**

![image](https://user-images.githubusercontent.com/78596837/141192867-5e9e84ad-0ff1-497d-8c0a-05892b1b31b3.png)

### Student Community

This is where students will be able to collaborate on work and ask each other things related to their own subjects.

![image](https://user-images.githubusercontent.com/78596837/144644088-b891c412-3ad7-45d5-9ba0-10c6cd6c724b.png)

### Regarding tutors

In regard to tutor, the views will be similar with additional functionality. There are security measures in place to ensure that there is no access from a student to tutors tools.

### Tutors Group Management

On this page, tutors can create groups of students which could be different classes or such. Groups are groups of students that can be chosen to assign assignments to be tutors, this will be shown further down.

![image](https://user-images.githubusercontent.com/78596837/141193329-c4173e52-628b-46d0-a156-09fbc4f964b9.png)

This is where tutors can view who is in the group and edit anything they need to edit regarding the group.

![image](https://user-images.githubusercontent.com/78596837/141193570-1793e005-8623-4854-a01e-087584e5c51c.png)

Here is where tutors can select different students to add to the group.

![image](https://user-images.githubusercontent.com/78596837/141193639-76dd275f-a2c2-41a5-92e2-a1de050a91df.png)

### Tutors Assignment Management

Tutors will have additional options to assign work to students, this is where they will do it. Which can be located inside the assignments tab in the navigation bar.

![image](https://user-images.githubusercontent.com/78596837/141193793-9318ce3e-d6a4-4337-8331-909693797db5.png)

Finally, tutors can see who has seen the assignment and when they have submitted the students work along with editing the assignment information.

![image](https://user-images.githubusercontent.com/78596837/141193914-05bba580-b970-4ac0-9f58-78fe3b9c3dd4.png)
