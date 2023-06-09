# VeTrack
---

vechile tracker application by Ryan Noval Pratama.

  --- 
  
### App Detail

Frameworks :
- Laravel v10
- Bootstrap 5

Libraries :
- Flatpickr.js
- Select2
- Font Awesome v5.15.4

Environment :
- Fedora Workstation 38
- MySQL v8.0.33 
- Php v8.1.19
- Composer v2.5.7
- Node v18.16.0

### Demo
- admin 
	- email : admin@dummy.com
	- pass  : 123456789
- supervisor
	- email : supervisor@dummy.com
	- pass  : 123456789

## How to use
Note : This app uses migrations, seeder, and factories

---
##### Creating Request 

Only admins can add or delete vechile request, however the supervisors can approve or decline those requests, please follow the following instructions for more clarity :

1. Please login as admin to create new request.
2. Navigate to sidebar and click on add button under the requests menu.
3. Fill all the required fields.
4. Click add on the bottom right corner.
5. The request have been made, now their current status are waiting

##### 1st Approval
To Approve or decline the request please do the following process :
1. Login as supervisor
2. Navigate to sidebar and click on list button, under the request menu.
3. You will see a table of request, and their status, you can filter them to show only certain requests.
4. On the right side of the table you will see three vertical dots, click on it.
5. it should show another pop up, select edit to continue the process
6. now on the bottom right corner you will see decline and confirm buttons, select accordingly to approve or decline request.
7. if you click confirm the status of the request will change to status 2 (in progress) meaning that the vechile is now on the hand of the driver

##### Report
After driver finished using the car, admin should update the status of the request as a report
1. Login as admin
2. Navigate to sidebar and click on list button, under the request menu.
3. Click on the vertical dot button
4. Select edit
5. Fill all the required informations
6. Now you can click done on the bottom right corner, meaning that the vechile is back.

##### 2nd Approval
Second approval is used to mark that the request is done and both admin and superviser have known about this. 
1. Login as superviser
2. Navigate to sidebar and click on list button, under the request menu.
3. Click on the vertical dot button
4. Select edit
5. Now you can click Finish on the bottom right corner, meaning that the vechile is back.

##### Vechile usage history
On the top right corner of request table you will see an export button, click this button to download all the request that have been done, also with its properties to excel csv format.


