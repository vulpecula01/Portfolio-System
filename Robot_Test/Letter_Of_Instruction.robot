*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : LetterOfInstruction
    Open Browser  http://10.80.34.5:9001/index.php/c_login   GC
    Input Text    name=username    admin
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Letter of Instruction')]]
    Wait Until Page Contains  Insert Letter of Instruction

1. EmptyAll
	
	Input Text    name=let_id   ${EMPTY}
    Input Text    name=let_name    ${EMPTY}
    Click Button    xpath=//button[@type="submit"]


2. InsertCorrespondence No.

    Input Text    name=let_id   3652/856
    Input Text    name=let_name    ${EMPTY}
    Click Button    xpath=//button[@type="submit"]


3. InsertSubject

    Input Text    name=let_id   ${EMPTY}
    Input Text    name=let_name    หนังสือขอความร่วมมือ
    Click Button    xpath=//button[@type="submit"]

4. ChooseFile

    Input Text    name=let_id   ${EMPTY}
    Input Text    name=let_name    ${EMPTY}
    Choose File   name=uploadfile   C:/Users/Vulpeculaz/Desktop/Doc1.docx
    Click Button    xpath=//button[@type="submit"]


5. InsertAll

    Input Text    name=let_id   3652/856
    Input Text    name=let_name    หนังสือขอความร่วมมือ
    Choose File   name=uploadfile   C:/Users/Vulpeculaz/Desktop/Doc1.docx
    Click Button    xpath=//button[@type="submit"]