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

1.MainNavigation : Letter of Instruction EmptyAll

    Click Element    xpath=//span[text()[contains(.,'หนังสือคำสั่ง')]]
	Wait Until Page Contains   Insert Letter of Instruction
	Input Text    name=let_id   ${EMPTY}
    Input Text    name=let_name    ${EMPTY}
    Click Element  xpath=//select[@id="example-getting-started"]/option[@value='35']
    Click Button    xpath=//button[@type="submit"]

2. InsertCorrespondence No.
 	Input Text    name=let_id   3521/68
    Input Text    name=let_name    ${EMPTY}
    Click Element  xpath=//select[@id="example-getting-started"]/option[@value='35']
    Click Button    xpath=//button[@type="submit"]

3. InsertSubject
 	Input Text    name=let_id  ${EMPTY}
    Input Text    name=let_name    นโยบายคุณธรรม
    Click Element  xpath=//select[@id="example-getting-started"]/option[@value='35']
    Click Button    xpath=//button[@type="submit"]

4. InsertReciever
 	Input Text    name=let_id  ${EMPTY}
    Input Text    name=let_name    ${EMPTY}
    Click Element  xpath=//select[@id="example-getting-started"]/option[@value='35']
    Click Button    xpath=//button[@type="submit"]


5. ChooseFile
	
	Input Text    name=let_id  ${EMPTY}
    Input Text    name=let_name    ${EMPTY}
    Click Element  xpath=//select[@id="example-getting-started"]/option[@value='35']
	Choose File   name=let_file 	 C:/Users/Vulpeculaz/Desktop/Doc1.docx
    Click Button    xpath=//button[@type="submit"]

6. InsertAll

	Input Text    name=let_id  		3521/68
    Input Text    name=let_name    นโยบายคุณธรรม
    Click Element  xpath=//select[@id="example-getting-started"]/option[@value='35']
    Choose File   name=let_file 	 C:/Users/Vulpeculaz/Desktop/Doc1.docx
    Click Button    xpath=//button[@type="submit"]
