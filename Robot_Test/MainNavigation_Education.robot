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

    Click Element    xpath=//span[text()[contains(.,'Information Category')]]
	Wait Until Page Contains  Education Information
    

2. Topic : Education Information

	Sleep  1s
	Click Element    xpath=//span[text()[contains(.,'Education Information')]]
	Wait Until Page Contains   Country 


2.1 Topic : Country EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Country')]]
	Wait Until Page Contains   Insert Country
	Input Text    name=cou_tname    ${EMPTY}
	Input Text    name=cou_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


2.2 InsertCountry (TH)

	Input Text    name=cou_tname    แคนาดา
	Input Text    name=cou_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

2.3 InsertCountry (EN)

	Input Text    name=cou_tname    ${EMPTY}
	Input Text    name=cou_ename    Canada
	Click Button    xpath=//button[@type="submit"]


2.4 InsertCountry (TH) key ENGLanguage

	Input Text    name=cou_tname    Canada


2.5 InsertCountry (EN) key THLanguage

	Input Text    name=cou_tname     แคนาดา


2.6 InsertAll

	Input Text    name=cou_tname    แคนาดา
	Input Text    name=cou_ename    Canada
	Click Button    xpath=//button[@type="submit"]


3. Topic : Degree EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Degree')]]
	Wait Until Page Contains   Insert Degree
	Click Element  xpath=//select[@name="edl_id"]
	Input Text    name=deg_tname    ${EMPTY}
	Input Text    name=deg_tacronym    ${EMPTY}
	Input Text    name=deg_ename    ${EMPTY}
	Input Text    name=deg_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

3.1 InsertEducation Level

	Click Element  xpath=//select[@name="edl_id"]/option[@value="1"]
	Input Text    name=deg_tname    ${EMPTY}
	Input Text    name=deg_tacronym    ${EMPTY}
	Input Text    name=deg_ename    ${EMPTY}
	Input Text    name=deg_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

3.2 InsertDegree (TH)

	Click Element  xpath=//select[@name="edl_id"]
	Input Text    name=deg_tname    วิทยาศาสตร์บัณฑิต
	Input Text    name=deg_tacronym    ${EMPTY}
	Input Text    name=deg_ename    ${EMPTY}
	Input Text    name=deg_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]

3.3 InsertDegree (EN)

	Click Element  xpath=//select[@name="edl_id"]
	Input Text    name=deg_tname       ${EMPTY}
	Input Text    name=deg_tacronym    ${EMPTY}
	Input Text    name=deg_ename    Bachelor of Science
	Input Text    name=deg_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


3.4 InsertAcronyms (TH)

	Click Element  xpath=//select[@name="edl_id"]
	Input Text    name=deg_tname    ${EMPTY}
	Input Text    name=deg_tacronym    วท.บ.
	Input Text    name=deg_ename    ${EMPTY}
	Input Text    name=deg_eacronym    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


3.5 InsertAcronyms (EN)

	Click Element  xpath=//select[@name="edl_id"]
	Input Text    name=deg_tname       ${EMPTY}
	Input Text    name=deg_tacronym    ${EMPTY}
	Input Text    name=deg_ename       ${EMPTY}
	Input Text    name=deg_eacronym    B.Sc.
	Click Button    xpath=//button[@type="submit"]


3.6 InsertDegree (TH) key ENGLanguage

	Input Text    name=deg_tname       Bachelor of Science


3.7 InsertDegree (EN) key THLanguage

	Input Text    name=deg_ename       วิทยาศาสตร์บัณฑิต


3.8 InsertAcronyms (TH) key ENGLanguage

	Input Text    name=deg_tacronym    B.Sc.


3.9 InsertAcronyms (EN) key THLanguage

	Input Text    name=deg_eacronym    วท.บ.


3.10 InsertAll

	Click Element  xpath=//select[@name="edl_id"]/option[@value="1"]
	Input Text    name=deg_tname       วิทยาศาสตร์บัณฑิต
	Input Text    name=deg_tacronym    วท.บ.
	Input Text    name=deg_ename       Bachelor of Science
	Input Text    name=deg_eacronym    B.Sc.
	Click Button    xpath=//button[@type="submit"]


4. Topic : Education Level EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Education Level')]]
	Wait Until Page Contains   Insert Education Level
	Input Text    name=edl_tname    ${EMPTY}
	Input Text    name=edl_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


4.1 InsertEducation Level (TH)

	Input Text    name=edl_tname    ปริญญาตรี
	Input Text    name=edl_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


4.2 InsertEducation Level (EN)

	Input Text    name=edl_tname    ${EMPTY}
	Input Text    name=edl_ename    Bachelor's degree
	Click Button    xpath=//button[@type="submit"]


4.3 InsertEducation Level (TH) key ENGLanguage

	Input Text    name=edl_tname     Bachelor's degree


4.4 InsertEducation Level (EN) key THLanguage

	Input Text    name=edl_ename     ปริญญาตรี


4.5 InsertAll

	Input Text    name=edl_tname    ปริญญาตรี
	Input Text    name=edl_ename    Bachelor's degree
	Click Button    xpath=//button[@type="submit"]


5. Topic : Institute EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Institute')]]
	Wait Until Page Contains   Insert Institute
	Input Text    name=ins_tname    ${EMPTY}
	Input Text    name=ins_ename    ${EMPTY}
	Click Element  xpath=//select[@name="cou_id"]
	Click Button    xpath=//button[@type="submit"]


5.1 InsertInstitute Name (TH)

	Input Text    name=ins_tname    จุฬาลงกรณ์มหาวิทยาลัย 
	Input Text    name=ins_ename    ${EMPTY}
	Click Element  xpath=//select[@name="cou_id"]
	Click Button    xpath=//button[@type="submit"]


5.2 InsertInstitute Name (EN)

	Input Text    name=ins_tname    ${EMPTY}
	Input Text    name=ins_ename    Chulalongkorn University
	Click Element  xpath=//select[@name="cou_id"]
	Click Button    xpath=//button[@type="submit"]

5.3 InsertCountry

	Input Text    name=ins_tname    ${EMPTY}
	Input Text    name=ins_ename    ${EMPTY}
	Click Element  xpath=//select[@name="cou_id"]/option[@value="1"]
	Click Button    xpath=//button[@type="submit"]


5.3 InsertInstitute Name (TH) key ENGLanguage

	Input Text    name=ins_tname     Chulalongkorn University


5.4 InsertInstitute Name (EN) key THLanguage

	Input Text    name=ins_ename     จุฬาลงกรณ์มหาวิทยาลัย 


5.5 InsertAll

	Input Text    name=ins_tname    จุฬาลงกรณ์มหาวิทยาลัย 
	Input Text    name=ins_ename    Chulalongkorn University
	Click Element  xpath=//select[@name="cou_id"]/option[@value="1"]
	Click Button    xpath=//button[@type="submit"]


6. Topic : Major EmptyAll

	Click Element    xpath=//a[text()[contains(.,'Major')]]
	Wait Until Page Contains   Insert Major
	Input Text    name=maj_tname    ${EMPTY}
	Input Text    name=maj_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


6.1 InsertMajor (TH)

	Input Text    name=maj_tname    เทคโนโลยีสารสนเทศ
	Input Text    name=maj_ename    ${EMPTY}
	Click Button    xpath=//button[@type="submit"]


6.2 InsertMajor (EN)

	Input Text    name=maj_tname    ${EMPTY}
	Input Text    name=maj_ename    Information Technology
	Click Button    xpath=//button[@type="submit"]


6.3 InsertMajor (TH) key ENGLanguage

	Input Text    name=maj_tname   Information Technology


6.4 InsertMajor (EN) key THLanguage

	Input Text    name=maj_ename     เทคโนโลยีสารสนเทศ


6.5 InsertAll

	Input Text    name=maj_tname    เทคโนโลยีสารสนเทศ
	Input Text    name=maj_ename    Information Technology
	Click Button    xpath=//button[@type="submit"]
