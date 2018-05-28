*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Insert Interests
    Open Browser   http://10.80.34.5:9001/index.php/c_login     GC
    Input Text    name=username    admin
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Interests')]]
    Wait Until Page Contains  กรอกข้อมูลความสนใจ


1. EmptyAll
	
	Click Element  xpath=//select[@name="int_type"]
	Input Text    name=int_tname    ${EMPTY}
    Input Text    name=int_ename    ${EMPTY}
    Click Button    xpath=//button[@type="submit"]


2. EmptyType
	
	Click Element  xpath=//select[@name="int_type"]/option[@value="1"]
	Input Text    name=int_tname    ${EMPTY}
    Input Text    name=int_ename    ${EMPTY}
    Click Button    xpath=//button[@type="submit"]


3. InsertInterests(TH)

	Click Element  xpath=//select[@name="int_type"]/option[@value=""]
	Input Text    name=int_tname    เล่นกีต้า
    Input Text    name=int_ename    ${EMPTY}
    Click Button    xpath=//button[@type="submit"]




4. InsertInterests(EN)

	Click Element  xpath=//select[@name="int_type"]/option[@value=""]
	Input Text    name=int_tname    ${EMPTY}
    Input Text    name=int_ename    Play a Guitar
    Click Button    xpath=//button[@type="submit"]


5. Insert Interests (TH) key ENGLanguage

  Input Text    name=int_tname    Play a Guitar


6. Insert Interests (EN) key ENGLanguage

  Input Text    name=int_ename    เล่นกีต้า


7. InsertInterests 

	Click Element  xpath=//select[@name="int_type"]/option[@value="1"]
	Input Text    name=int_tname    เล่นกีต้า
    Input Text    name=int_ename    Play a Guitar
    Click Button    xpath=//button[@type="submit"]  


