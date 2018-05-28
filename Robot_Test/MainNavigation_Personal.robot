*** Settings ***
Library           Selenium2Library

*** Test Cases ***

UserNavigation : Change to Admin
    Open Browser    http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Link    xpath=//a[@href='http://localhost:8080/index.php/c_admin_page']
    Wait Until Page Contains  Change to User


1.MainNavigation : Information Category

    ClickElement    xpath=//span[text()[contains(.,'Information Category')]]
	Wait Until Page Contains  Personal Information
    

2. Topic : Personal Information

	Sleep    1s
	ClickElement    xpath=//span[text()[contains(.,'Personal Information')]]
	Wait Until Page Contains   Academic Title 


2.1 Topic : Academic Title EmptyAll

	ClickElement    xpath=//a[text()[contains(.,'Academic Title')]]
	Wait Until Page Contains   Insert Academic Title 
	Input Text    name=acr_tname    ${EMPTY}
	Input Text    name=acr_ename    ${EMPTY}
	Input Text    name=acr_tacronym    ${EMPTY}
	Input Text    name=acr_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


2.2 InsertAcademic Title (TH)

	
	Input Text    name=acr_tname    ศาสตราจารย์
	Input Text    name=acr_ename    ${EMPTY}
	Input Text    name=acr_tacronym    ${EMPTY}
	Input Text    name=acr_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


2.3 InsertAcademic Title (EN)

	
	Input Text    name=acr_tname    ${EMPTY}
	Input Text    name=acr_ename    Professor
	Input Text    name=acr_tacronym    ${EMPTY}
	Input Text    name=acr_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


2.4 InsertAcronyms (TH)

	
	Input Text    name=acr_tname    ${EMPTY}
	Input Text    name=acr_ename    ${EMPTY}
	Input Text    name=acr_tacronym    ศ.
	Input Text    name=acr_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


2.5 InsertAcronyms (EN)

	
	Input Text    name=acr_tname    ${EMPTY}
	Input Text    name=acr_ename    ${EMPTY}
	Input Text    name=acr_tacronym    ${EMPTY}
	Input Text    name=acr_eacronym    Prof.
	Click Button    xpath=//button[@type="submit"]


2.6 Insert Academic Title (TH) key ENLanguage

	
	Input Text    name=acr_tname    Professor

2.7 Insert Academic Title (EN) key THLanguage

	
	Input Text    name=acr_ename    ศาสตราจารย์


2.8 Insert Acronyms (TH) key ENLanguage

	
	Input Text    name=acr_tacronym    ศ.


2.9 Insert Acronyms (EN) key THLanguage

	
	Input Text    name=acr_eacronym    Prof.	


2.10 InsertAll

	
	Input Text    name=acr_tname    ศาสตราจารย์
	Input Text    name=acr_ename    Professor
	Input Text    name=acr_tacronym    ศ.
	Input Text    name=acr_eacronym    Prof.
	Click Button    xpath=//button[@type="submit"]



3. Topic : Department EmptyAll

	ClickElement    xpath=//a[text()[contains(.,'Department')]]
	Wait Until Page Contains   Insert Department 
	Input Text    name=dep_tname     ${EMPTY}
	Input Text    name=dep_ename     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


3.1 InsertDepartment name (TH) 

	
	Input Text    name=dep_tname     เทคโนโลยีสารสนเทศ
	Input Text    name=dep_ename     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


3.2 InsertDepartment name (EN) 

	Input Text    name=dep_tname     ${EMPTY}
	Input Text    name=dep_ename     Information Technology
	Click Button    xpath=//button[@type="submit"]



3.3 InsertDepartment name (TH) key ENGLanguage

	
	Input Text    name=dep_tname     Information


3.4 InsertDepartment name (EN) key THLanguage

	
	Input Text    name=dep_ename     เทคโนโลยีสารสนเทศ



3.5 Topic : InsertAll

	
	Input Text    name=dep_tname     เทคโนโลยีสารสนเทศ
	Input Text    name=dep_ename     Information Technology
	Click Button    xpath=//button[@type="submit"]
	


4. Topic : Interest EmptyAll

	ClickElement    xpath=//a[text()[contains(.,'Interest')]]
	Wait Until Page Contains   Insert Interest 
	Input Text    name=itt_tname    ${EMPTY}
	Input Text    name=itt_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


4.1 Interest (TH)

	
	Input Text    name=itt_tname     หัวข้อที่สนใจ
	Input Text    name=itt_ename     ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


4.2 Interest (EN)


	Input Text    name=itt_tname     ${EMPTY}
	Input Text    name=itt_ename     Topics of interest
	Click Button    xpath=//button[@type="submit"]


4.3 Interest (TH) key ENGLanguage

	Input Text    name=itt_tname     Topics of interest

4.4 Interest (EN) key THLanguage

	Input Text    name=itt_ename     หัวข้อที่สนใจ

4.5 InsertAll

	
	Input Text    name=itt_tname     หัวข้อที่สนใจ
	Input Text    name=itt_ename     Topics of interest
	Click Button    xpath=//button[@type="submit"]



5. Topic : Subject EmptyAll

	ClickElement    xpath=//a[text()[contains(.,'Subject')]]
	Wait Until Page Contains   Insert Subject 
	Input Text    name=sub_code    ${EMPTY}
	Input Text    name=sub_tname   ${EMPTY}
	Input Text    name=sub_ename   ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


5.1 InsertCourse Code

	
	Input Text    name=sub_code    887373
	Input Text    name=sub_tname     ${EMPTY}
	Input Text    name=sub_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


5.2 InsertSubject (TH)

	
	Input Text    name=sub_code    ${EMPTY}
	Input Text    name=sub_tname      เทคโนโลยีเว็บเซอร์วิส
	Input Text    name=sub_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]
	

5.2 InsertSubject (EN)

	
	Input Text    name=sub_code    ${EMPTY}
	Input Text    name=sub_tname     ${EMPTY}
	Input Text    name=sub_ename   Web Services Technology
	Click Button    xpath=//button[@type="submit"]


5.3 Insert Subject (TH) key ENGLanguage

	Input Text    name=sub_tname     Web Services Technology


5.4 Insert Subject (EN) key THLanguage

	Input Text    name=sub_ename   เทคโนโลยีเว็บเซอร์วิส


5.5 InsertAll

	
	Input Text    name=sub_code   887373
	Input Text    name=sub_tname    เทคโนโลยีเว็บเซอร์วิส
	Input Text    name=sub_ename   Web Services Technology
	Click Button    xpath=//button[@type="submit"]

