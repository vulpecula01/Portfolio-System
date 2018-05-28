*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : General Information
    Open Browser   http://10.80.34.5:9001/index.php/c_login   GC
    Input Text    name=username    admin
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    ClickElement    xpath=//a[text()[contains(.,'General Information')]]
    Wait Until Page Contains  ข้อมูลทั่วไป


1. EmptyAll
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	
2. InsertID
	input Text    name=TID     ${57160612}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

3. InsertPrefix
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="3"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


4. InsertName(TH)

	
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     อนุรักษ์
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


5. InsertLastName(TH)

	
   input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     บุตศรี
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

6. InsertName(EN)

	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     Anurak
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


7. InsertLastName(EN)

	
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    Butsri
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	
	
	
8. InsertLocation


	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    13/13 ต.กะเฉด อ.เมือง จ.ระยอง 21100
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	
	
9. InsertFaculty


	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    วิทยาการสารสนเทศ
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	
	
10. InsertCampus


	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    บางแสน
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	

11. InsertDepartment

	
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]/option[@value="2"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	

12.InsertDateWork


	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]//option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    2540
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	
	
13.InsertPosition


	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]/option[@value="4"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	
14. InsertSalary

		
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    25000
	Input Text    name=telnum[]     ${EMPTY}
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	

15. InsertTel

	
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]   0637426650
	Input Text    name=mail[]     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]



16. InsertE-mail

	
	input Text    name=TID     ${EMPTY}
	Click Element  xpath=//select[@name="prefix"]/option[@value="0"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     ${EMPTY}
	Input Text    name=lnameTH     ${EMPTY}
	Input Text    name=nameENG     ${EMPTY}
	Input Text    name=lnameENG    ${EMPTY}
	Input Text    name=Location    ${EMPTY}
	Input Text    name=Campus    ${EMPTY}
	Input Text    name=Faculty    ${EMPTY}
	Click Element  xpath=//select[@name="dep"]
	Input Text    name=datework    ${EMPTY}
	Click Element  xpath=//select[@name="pos"]
	Input Text    name=salary    ${EMPTY}
	Input Text    name=telnum[]   ${EMPTY}
	Input Text    name=mail[]     57160612@go.buu.ac.th
	Click Button    xpath=//button[@type="submit"]


17. Input NameTH and LNameTH key ENGLanguage
	Input Text    name=nameTH    อนุรักษ์Anurak
	Input Text    name=lnameTH   บุตศรีButsri

18. Input NameENG and LNameENG key THLanguage
	Input Text    name=nameENG    Anurakอนุรักษ์
	Input Text    name=lnameENG   Butsriบุตศรี

19. Check Input Tel
	Input Text    name=telnum[]  0123456789

20. Check E-mail key THLanguage
	Input Text    name=mail[]    anurakbutsri@gmail.comกขคง


21.InsertAll
	input Text    name=TID     57160612
	Click Element  xpath=//select[@name="prefix"]/option[@value="1"]
    Select Checkbox  xpath=(//input[@type='checkbox']) 
	Input Text    name=nameTH     อนุรักษ์
	Input Text    name=lnameTH     บุตศรี
	Input Text    name=nameENG     Anurak
	Input Text    name=lnameENG    Butsri
	Input Text    name=Location    13/13 ต.กะเฉด อ.เมือง จ.ระยอง 21100
	Input Text    name=Campus    วิทยาการสารสนเทศ
	Input Text    name=Faculty    บางแสน
	Click Element  xpath=//select[@name="dep"]/option[@value="1"]
	Input Text    name=datework    2540
	Click Element  xpath=//select[@name="pos"]/option[@value="1"]
	Input Text    name=salary    25000
	Input Text    name=telnum[]   0637426650
	Input Text    name=mail[]     57160612@go.buu.ac.th
	Click Button    xpath=//button[@type="submit"]

