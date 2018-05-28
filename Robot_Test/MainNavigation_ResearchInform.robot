*** Settings ***
Library           Selenium2Library

*** Test Cases ***

UserNavigation : Change to Admin
  Open Browser   http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Link    xpath=//a[@href='http://localhost:8080/index.php/c_admin_page']
    Wait Until Page Contains  Change to User

1.MainNavigation : Information Category

    Click Element    xpath=//span[text()[contains(.,'Information Category')]]
	Wait Until Page Contains  Education Information


2. Topic : Research Information
   
    Sleep    1s
	Click Element    xpath=//span[text()[contains(.,'Research Information')]]
	Wait Until Page Contains   Research Level       


2.1 Topic : Type of Research EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Type of Research')]]
	Wait Until Page Contains   Insert Type of Research
	Input Text    name=ret_tname    ${EMPTY}
	Input Text    name=ret_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


2.2 InsertType of Research (TH)
	
	Input Text    name=ret_tname    พื้นฐาน
	Input Text    name=ret_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

2.3 InsertType of Research (EN)
	
	Input Text    name=ret_tname    ${EMPTY}
	Input Text    name=ret_ename    Basic research
	Click Button    xpath=//button[@type="submit"]


2.4 InsertType of Research (TH) key ENLanguage

	Input Text    name=ret_tname    Basic research


2.5 InsertType of Research (EN) key THLanguage

	Input Text    name=ret_ename   พื้นฐาน


2.6 InsertAll

	Input Text    name=ret_tname    พื้นฐาน
	Input Text    name=ret_ename    Basic research
	Click Button    xpath=//button[@type="submit"]



3. Topic : Type of Researcher EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Type of Researcher')]]
	Wait Until Page Contains   Insert Type of Researcher
	Input Text    name=rst_tname    ${EMPTY}
	Input Text    name=rst_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


3.1 InsertType of Researcher (TH)

	Input Text    name=rst_tname    หัวหน้าโครงการวิจัย
	Input Text    name=rst_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


3.2 InsertType of Researcher (EN)

	Input Text    name=rst_tname    ${EMPTY}
	Input Text    name=rst_ename    Project Leader
	Click Button    xpath=//button[@type="submit"]


3.3 InsertType of Researcher (TH) key ENGLanguage

	Input Text    name=rst_tname    Project Leader


3.4 InsertType of Researcher (EN) key THLanguage

	Input Text    name=rst_ename     หัวหน้าโครงการวิจัย


3.5 InsertAll

	Input Text    name=rst_tname    หัวหน้าโครงการวิจัย
	Input Text    name=rst_ename    Project Leader
	Click Button    xpath=//button[@type="submit"]


4. Topic : Research Integrating EmptyAll 

	Click Element    xpath=//a[text()[contains(.,'Research Integrating')]]
	Wait Until Page Contains   Insert Research Integrating
	Input Text    name=itt_ttitle    ${EMPTY}
	Input Text    name=itt_etitle    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]  


4.1 InsertResearch Integrating (TH)

	Input Text    name=itt_ttitle    การเรียนการสอน
	Input Text    name=itt_etitle    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]  


4.2 InsertResearch Integrating (EN)

	Input Text    name=itt_ttitle    ${EMPTY}
	Input Text    name=itt_etitle    Instructional
	Click Button    xpath=//button[@type="submit"]  


4.3 InsertResearch Integrating (TH) key ENGLanguage

	Input Text    name=itt_ttitle    Instructional


4.4 InsertResearch Integrating (EN) key THLanguage

	Input Text    name=itt_etitle     การเรียนการสอน


4.5 InsertAll

	Input Text    name=itt_ttitle    การเรียนการสอน
	Input Text    name=itt_etitle    Instructional
	Click Button    xpath=//button[@type="submit"]  


5. Topic : Research Level EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Research Level')]]
	Wait Until Page Contains   Insert Research Level
	Input Text    name=rlv_ttitle    ${EMPTY}
	Input Text    name=rlv_etitle    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]  


5.1 InsertResearch Level (TH)

	Input Text    name=rlv_ttitle    ชาติ
	Input Text    name=rlv_etitle    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]  


5.2 InsertResearch Level (EN)

	Input Text    name=rlv_ttitle    ${EMPTY}
	Input Text    name=rlv_etitle    National
	Click Button    xpath=//button[@type="submit"]  


5.3 InsertResearch Level (TH) key ENGLanguage

	Input Text    name=rlv_ttitle    National


5.4 InsertResearch Level (EN) key THLanguage

	Input Text    name=rlv_etitle     ชาติ


5.5 InsertAll

	Input Text    name=rlv_ttitle    ชาติ
	Input Text    name=rlv_etitle    National
	Click Button    xpath=//button[@type="submit"] 


6. Topic : Research Status EmptyAll 

	Click Element    xpath=//a[text()[contains(.,'Research Status')]]
	Wait Until Page Contains   Insert Research Status
	Input Text    name=rst_ttitle    ${EMPTY}
	Input Text    name=rst_etitle    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]  


6.1 InsertResearch Status (TH)  

	Input Text    name=rst_ttitle    เผยแพร่เรียบร้อยแล้ว
	Input Text    name=rst_etitle    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


6.2 InsertResearch Status (EN)  

	Input Text    name=rst_ttitle    ${EMPTY}
	Input Text    name=rst_etitle    Published
	Click Button    xpath=//button[@type="submit"]  


6.3 InsertResearch Status (TH) key ENGLanguage

	Input Text    name=rst_ttitle    Published


6.4 InsertResearch Status (EN) key THLanguage

	Input Text    name=rst_etitle    เผยแพร่เรียบร้อยแล้ว


6.5 InsertAll

	Input Text    name=rst_ttitle    เผยแพร่เรียบร้อยแล้ว
	Input Text    name=rst_etitle    Published
	Click Button    xpath=//button[@type="submit"]  











