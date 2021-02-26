The main class (Core)

The OnTime framework is designed to be modular, scalable and comprehensive, so that each new feature integrates without difficulty and maintains a unique class definition (OnTime) and all "additional classes" are "trait" that enrich it, in such a way that an integrated system is obtained, not separate programs which do not necessarily have to behave correctly together.

Installation in test environment:

1.- Create an empty directory within the web container location (only for example purposes it is considered to be called “demo”).

2.- Copy all the files in the directory (make sure to assign user permissions)

3.- With the browser of your preference, locate the directory you created and enter it

4.- Execute the OntimeInstaller.php file

5.- When executing the file, an "OnTime" directory was created, the files were moved and the required environment was created

Recommendations:

If you know how to create a subdomain that points to the "demo" directory, it is more comfortable and realistic.

After install

When installing, the necessary environment is defined to define access security, I create a User called "Admin" and that his password is "OT2021Free", this environment left the class prepared for the control of Users, Errors and Features


Relative to the System

The concept of access level is considered.

The concept of connected / disconnected is considered

“Main” is considered a special feature

The user characteristic "usr" is created


Relative to Users

Creation of users

Name Change and Nick

User deletion

Change my password

Force password change

Status management in the user

Management of public information

Management of private information


Relative to features

Management of public information

Management of private information

User assignment and their level


Relating to Errors

Creating Errors

Modification of the descriptive text

Error Elimination

Additional supports

In the directory you created there is a file two files in pdf format, the reference in English and Spanish, also the file "DemoCore.php"


mario.carrocera@hotmail.com


**********************
DemoCore Results
**********************

**********
Create Class
**********

basic content exist
**********
Run Instaler
**********

**********+++++++++++
Where not conected
**********+++++++++++

Id when not conected: Anonimus
Conecion statust: False
**********
Show Errors
**********

C0010M001=>Failing read content
C0010M002=>Failing create content
C0010M003=>Failing save content
C0010M004=>Missing container
C0010M005=>Mising system content,file system corrupted
C0010M006=>Access error
C0010M007=>Record exist
C0010M008=>Record don't exist
C0010M009=>Record not avaible
C0010M010=>Record not visible
C0010M011=>Not conected
C0010M012=>Not autorized
C0010M013=>Can't change id
C0010M014=>Unkwow cointeiner
C0010M015=>Featured just for pay vertion
C0010M016=>Wrong data suply
C0010M017=>Container exist
C0010M018=>Not valid value
C0010M019=>Feature not installed
C0010M020=>Feature installed
C0010M021=>Already connected
C0010M022=>Record not active
C0010M023=>Record not autorized
C0010M024=>Unkown status
C0010M025=>Not a valid status
C0010M026=>Not a valid data
C0010M035=>Can't delete user admin
C0010M036=>Can't modify user admin
**********
Show features
**********

usr=>usr
**********
Show content
**********

error.json=>file
features.json=>file
container.json=>file
level.json=>file
status.json=>file
users.json=>file
**********
Show Level
**********

owner=>0
remove=>1
create=>2
change=>3
access=>4
admin=>10
delete=>11
insert=>12
update=>13
umine=>14
view=>15
vmine=>16
**********
Show Status
**********

active=>0
force=>1
**********+++++++++++
Conecting like admin
**********+++++++++++

Connect('admin','OT2021Free')
C0010M012.-Not autorized

Connect('Admin','OT2021Free')
C0010M008.-Record don't exist

Connect('admin','OT2021Free')
Conected!!!

**********+++++++++++
Loaded on conection
**********+++++++++++

Id when conected: admin
Showing Public Information of the user
hobies=>play & program
dog=>Boby
wife=>Beatriz
mascot=>dog
name=>Robert
phone=>i dont have
Color=>Red

Showing Private Information of the user
phone=>Sorry private
Wife=>Bety
Color=>Red
bio=>in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line, in private

Showing Safety of the user
usr=>owner
main=>owner

**********+++++++++++
Try conect where conected
**********+++++++++++

Connect('admin','OT2021Free')
C0010M021.-Already connected

**********+++++++++++
User
**********+++++++++++

**********
Adding
**********+

CrtUsr('admin','xxx','active','name','active')
C0010M007.-Record exist

CrtUsr('demo','12345','active','Demostration User','demo')
Added!!!

CrtUsr('xdemo','23456','active','Another User','demo')
Added!!!

CrtUsr('Demo','34567','active','Case Sensitive User','demo')
Added!!!

CrtUsr('last','45678','active','Last User','demo')
Added!!!

**********
Show All
**********+

Demo=>Case Sensitive User(demo)
admin=>System Administrator(Administrator)
demo=>Demostration User(demo)
last=>Last User(demo)
xdemo=>Another User(demo)
**********
Deleting
**********+

UsrDlt('xadmin')
C0010M008.-Record don't exist

UsrDlt('admin')
C0010M035.-Can't delete user admin

UsrDlt('demo')
Deleted!!!

**********
Show All
**********+

Demo=>Case Sensitive User(demo)
admin=>System Administrator(Administrator)
last=>Last User(demo)
xdemo=>Another User(demo)
**********+++++++++++
Change User
**********+++++++++++

DiscConnect()
Disconected!!!

Connect('xdemo','23456')
Conected!!!

**********+++++++++++
User
**********+++++++++++

**********
Deleting
**********+

UsrDlt('Demo')
C0010M012.-Not autorized

**********+++++++++++
Change User
**********+++++++++++

DiscConnect()
Disconected!!!

Connect('admin','OT2021Free')
Conected!!!

**********+++++++++++
User
**********+++++++++++

**********
Change
**********+

UsrChgInf('zdemo','His new name', 'None')
C0010M008.-Record don't exist

UsrChgInf('xdemo','His new name', 'None')
Changed!!!

MyChgInf('Still the admin', 'Mario')
Changed!!!

**********
Show All
**********+

Demo=>Case Sensitive User(demo)
admin=>Still the admin(Mario)
last=>Last User(demo)
xdemo=>His new name(None)
**********+++++++++++
Password Check Options
**********+++++++++++

**********
Check
**********+

PssChk('none','His new name')
C0010M008.-Record don't exist

PssChk('admin','fgkkjhkj')
C0010M012.-Not autorized

PssChk('admin','OT2021Free')
Correct!!!

PssChk('last','45678')
Correct!!!

**********+++++++++++
Status Options
**********+++++++++++

**********
Check status
**********+

UserChkStt('admin'): active
**********
Change status
**********+

UserChgStt('laxt','force')
C0010M008.-Record don't exist

UserChgStt('last','forc')
C0010M008.-Record don't exist

UserChgStt('last','force')
Correct!!!

**********+++++++++++
Change User
**********+++++++++++

DiscConnect()
Disconected!!!

Connect('last','45678')
C0010M022.-Record not active

**********+++++++++++
Force Change Password
**********+++++++++++

FrcPssChg('laxt','OT2021Free','87654')
C0010M025.-Not a valid status

FrcPssChg('laxt','force')
C0010M008.-Record don't exist

FrcPssChg('last','5678','87654')
C0010M012.-Not autorized

FrcPssChg('last','45678','87654')
Correct!!!

**********+++++++++++
Change User
**********+++++++++++

DiscConnect()
C0010M011.-Not conected

Connect('last','87654')
Conected!!!

**********+++++++++++
Change my Password
**********+++++++++++

MyPssChg('admin','87654')
C0010M012.-Not autorized

MyPssChg('87654','none')
Correct!!!

**********+++++++++++
Change User
**********+++++++++++

DiscConnect()
Disconected!!!

Connect('admin','OT2021Free')
Conected!!!

**********+++++++++++
Main Feature
**********+++++++++++

**********
Show User
**********+

admin=>owner
**********
Add User
**********+

UsrAddMn('admin','none')
C0010M008.-Record don't exist

UsrAddMn('admin','remove')
C0010M007.-Record exist

UsrAddMn('last','remove')
Added!!!

UsrAddMn('Demo','remove')
Added!!!

**********
Show User
**********+

admin=>owner
last=>remove
Demo=>remove
**********
Change User Level
**********+

UsrChgMn('admin','remove')
C0010M036.-Can't modify user admin

UsrChgMn('xdemo','remove')
C0010M008.-Record don't exist

UsrChgMn('none','remove')
C0010M008.-Record don't exist

UsrChgMn('last','none')
C0010M008.-Record don't exist

UsrChgMn('last','owner')
changed!!!

**********
Show User
**********+

admin=>owner
last=>remove
Demo=>remove
**********
Delete User Level
**********+

UsrDltMn('admin')
C0010M036.-Can't modify user admin

UsrDltMn('none')
C0010M008.-Record don't exist

UsrDltMn('last')
delete!!!

**********
Show User
**********+

admin=>owner
Demo=>remove
**********+++++++++++
Other Feature
**********+++++++++++

**********
Show All
**********+

FrtShwAll()
usr=>Users Feature(Users)
**********
Show User Feature
**********+

UsrShwFtr('admin')
usr=>owner
main=>owner
**********
Show Feature User
**********+

FtrShwUsr('usr')
Demo1=>1
admin=>owner
**********
Add User
**********+

UsrAddFtr('usrx','xlast','xcreate')
C0010M012.-Not autorized

UsrAddFtr('usr','xlast','xcreate')
C0010M008.-Record don't exist

UsrAddFtr('usr','last','xcreate')
C0010M008.-Record don't exist

UsrAddFtr('usr','last','create')
Added!!!

**********
Change User
**********+

UsrChgFtr('usrx','xlast','xcreate')
C0010M012.-Not autorized

UsrChgFtr('usr','xlast','xcreate')
C0010M008.-Record don't exist

UsrChgFtr('usr','last','xcreate')
C0010M008.-Record don't exist

UsrChgFtr('usr','last','xcreate')
C0010M008.-Record don't exist

UsrChgFtr('usr','last','remove')
Changed!!!

**********
Delete User
**********+

UsrDltFtr('usr','admim')
C0010M008.-Record don't exist

UsrDltFtr('usrx','xlast')
C0010M012.-Not autorized

UsrDltFtr('usr','xlast')
C0010M008.-Record don't exist

UsrDltFtr('usr','last')
Deleted!!!

**********+++++++++++
Errors
**********+++++++++++

**********
Adding
**********+

ErrAdd('C0010M012','Description')
C0010M007.-Record exist

ErrAdd('C0010M012','Description')
Added!!!

**********
Show Errors
**********

C0010M001=>Failing read content
C0010M002=>Failing create content
C0010M003=>Failing save content
C0010M004=>Missing container
C0010M005=>Mising system content,file system corrupted
C0010M006=>Access error
C0010M007=>Record exist
C0010M008=>Record don't exist
C0010M009=>Record not avaible
C0010M010=>Record not visible
C0010M011=>Not conected
C0010M012=>Not autorized
C0010M013=>Can't change id
C0010M014=>Unkwow cointeiner
C0010M015=>Featured just for pay vertion
C0010M016=>Wrong data suply
C0010M017=>Container exist
C0010M018=>Not valid value
C0010M019=>Feature not installed
C0010M020=>Feature installed
C0010M021=>Already connected
C0010M022=>Record not active
C0010M023=>Record not autorized
C0010M024=>Unkown status
C0010M025=>Not a valid status
C0010M026=>Not a valid data
C0010M035=>Can't delete user admin
C0010M036=>Can't modify user admin
sample=>sample error
**********
Change
**********+

ErrChg('none','Description')
C0010M008.-Record don't exist

ErrChg('sample','Description')
change!!!

**********
Show Errors
**********

C0010M001=>Failing read content
C0010M002=>Failing create content
C0010M003=>Failing save content
C0010M004=>Missing container
C0010M005=>Mising system content,file system corrupted
C0010M006=>Access error
C0010M007=>Record exist
C0010M008=>Record don't exist
C0010M009=>Record not avaible
C0010M010=>Record not visible
C0010M011=>Not conected
C0010M012=>Not autorized
C0010M013=>Can't change id
C0010M014=>Unkwow cointeiner
C0010M015=>Featured just for pay vertion
C0010M016=>Wrong data suply
C0010M017=>Container exist
C0010M018=>Not valid value
C0010M019=>Feature not installed
C0010M020=>Feature installed
C0010M021=>Already connected
C0010M022=>Record not active
C0010M023=>Record not autorized
C0010M024=>Unkown status
C0010M025=>Not a valid status
C0010M026=>Not a valid data
C0010M035=>Can't delete user admin
C0010M036=>Can't modify user admin
sample=>New description
ErrDlt('none','Description')
C0010M008.-Record don't exist

ErrDlt('sample','Description')
change!!!

**********
Show Errors
**********

C0010M001=>Failing read content
C0010M002=>Failing create content
C0010M003=>Failing save content
C0010M004=>Missing container
C0010M005=>Mising system content,file system corrupted
C0010M006=>Access error
C0010M007=>Record exist
C0010M008=>Record don't exist
C0010M009=>Record not avaible
C0010M010=>Record not visible
C0010M011=>Not conected
C0010M012=>Not autorized
C0010M013=>Can't change id
C0010M014=>Unkwow cointeiner
C0010M015=>Featured just for pay vertion
C0010M016=>Wrong data suply
C0010M017=>Container exist
C0010M018=>Not valid value
C0010M019=>Feature not installed
C0010M020=>Feature installed
C0010M021=>Already connected
C0010M022=>Record not active
C0010M023=>Record not autorized
C0010M024=>Unkown status
C0010M025=>Not a valid status
C0010M026=>Not a valid data
C0010M035=>Can't delete user admin
C0010M036=>Can't modify user admin
**********+++++++++++
Public & Private Info
**********+++++++++++

**********
Public in user add
**********+

MyAddPbl('wife','Beatriz')
C0010M007.-Record exist

MyAddPbl('mascot','dog')
C0010M007.-Record exist

MyAddPbl('name','Boby')
C0010M007.-Record exist

MyAddPbl('bio','in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line ')
Added!!!

**********
Show Public information of currente user
**********

hobies=>play & program
dog=>Boby
wife=>Beatriz
mascot=>dog
name=>Robert
phone=>i dont have
Color=>Red
bio=>in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line
**********
Public in user change
**********+

MyChgPbl('son','Axel')
C0010M008.-Record don't exist

MyChgPbl('name','Robert')
Changed!!!

**********
Show Public information of currente user
**********

hobies=>play & program
dog=>Boby
wife=>Beatriz
mascot=>dog
name=>Robert
phone=>i dont have
Color=>Red
bio=>in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line
**********
Public in user delete
**********+

MyDltPbl('son')
C0010M008.-Record don't exist

MyDltPbl('bio')
Changed!!!

**********
Show Private information of currente user
**********

hobies=>play & program
dog=>Boby
wife=>Beatriz
mascot=>dog
name=>Robert
phone=>i dont have
Color=>Red
**********
Private in user add
**********+

MyAddPrv('son','Axel')
Added!!!

MyAddPrv('phone','i don't have)
C0010M007.-Record exist

MyAddPrv('Color','Red')
C0010M007.-Record exist

MyAddPrv('bio','in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line, in private ')
C0010M007.-Record exist

**********
Show Private information of currente user
**********

phone=>Sorry private
Wife=>Bety
Color=>Red
bio=>in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line, in private
son=>Axel
**********
Private in user change
**********+

MyChgPrv('Daugther','Axel')
C0010M008.-Record don't exist

MyAddPbl('Color','Blue')
C0010M007.-Record exist

**********
Show Private information of currente user
**********

phone=>Sorry private
Wife=>Bety
Color=>Red
bio=>in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line, in private
son=>Axel
**********
Private in user delete
**********+

MyDltPrv('Daugther')
C0010M008.-Record don't exist

MyDltPrv('son')
Added!!!

**********
Show Private information of currente user
**********

phone=>Sorry private
Wife=>Bety
Color=>Red
bio=>in the example y usually write short related information, but is just that a little example, could be so long as you need, feel free to do ur own test, look that i just write all this text to have more than one line, in private
**********
Show public information of especific user
**********

UserShwPbl('admin')hobies=>play & program
dog=>Boby
wife=>Beatriz
mascot=>dog
name=>Still the admin
phone=>i dont have
Color=>Red
nick=>Mario
**********
Private in Feature add
**********+

FtrAddPrv('usr','Contact','Can find me in ext 1234')
C0010M007.-Record exist

FtrAddPrv('usr','help','Call eze at any time')
C0010M007.-Record exist

FtrAddPrv('usr','sample','I will delete this line')
Added!!!

**********
Show private information of especific user
**********

FtrShwPrv('usr')
when=>today
Contact=>Can find me in ext 1234
help=>Call Eze at any time, must be capital
sample=>I will delete this line

**********
Private in Feature change
**********+

FtrChgPrv('usr','Contact','Dont worry not change')
C0010M008.-Record don't exist

FtrChgPrv('usr','help','Call Eze at any time, must be capital')
Added!!!

**********
Show private information of especific user
**********

FtrShwPrv('usr')
when=>today
Contact=>Can find me in ext 1234
help=>Call Eze at any time, must be capital
sample=>I will delete this line

**********
Private in Deleted delete
**********+

FtrDltPrv('usr','Contact')
C0010M008.-Record don't exist

FtrDltPrv('usr','sample')
Deleted!!!

**********
Show private information of especific user
**********

FtrShwPrv('usr')
when=>today
Contact=>Can find me in ext 1234
help=>Call Eze at any time, must be capital

**********
Public in Feature add
**********+

FtrAddPbl('usr','Contact','To get access to users send me a mail')
C0010M007.-Record exist

FtrAddPbl('usr','tall','a litle more than the average')
C0010M007.-Record exist

FtrAddPbl('usr','sample','I will delete this line, yes this one too')
Added!!!

**********
Show public information of especific user
**********

FtrShwPbl('usr')
when=>yesterday
Contact=>To get access to users send me a mail
tall=>change mu mind, this is selected
sample=>I will delete this line, yes this one too

**********
Public in Feature change
**********+

FtrChgPbl('usr','tall','change mu mind, this is selected')
Changed!!!

FtrChgPbl('usr','samplx','I will delete this line, yes this one too')
C0010M008.-Record don't exist

**********
Show public information of especific user
**********

FtrShwPbl('usr')
when=>yesterday
Contact=>To get access to users send me a mail
tall=>change mu mind, this is selected
sample=>I will delete this line, yes this one too

**********
Public in Feature delete
**********+

FtrDltPbl('usr','tal','change mu mind, this is selected')
C0010M008.-Record don't exist

FtrDltPbl('usr','sample','I will delete this line, yes this one too')
Deleted!!!

**********
Show public information of especific user
**********

FtrShwPbl('usr')
when=>yesterday
Contact=>To get access to users send me a mail
tall=>change mu mind, this is selected

**********+++++++++++
User on line
**********+++++++++++

**********
Show All
**********+

UsrShwNln()
admin=>Still the admin(Mario)
**********
Deleting demo user
**********+


Deleted!!!


Deleted!!!


Deleted!!!

**********+++++++++++
Demo Finish
**********+++++++++++











