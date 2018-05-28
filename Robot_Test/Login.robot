*** Settings ***
Library           Selenium2Library

*** Test Cases ***

LogIn
    Open Browser  http://10.80.34.5:9001/index.php/c_login  GC


1. EmptyAll
	
	Input Text    name=username    ${EMPTY}
    Input Text    name=password    ${EMPTY}
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    

2. InsertUserName
	Sleep    1s
	Input Text    name=username    admin
    Input Text    name=password    ${EMPTY}
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    

3. InsertPassWord
	Sleep    1s
	Input Text    name=username    ${EMPTY}
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
   

4. InsertUserNameInvalid
	Sleep    1s
	Input Text    name=username    addmin
    Input Text    name=password    ${EMPTY}
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
   

5. InsertPassWordInvalid
	Sleep    1s
	Input Text    name=username     ${EMPTY}
    Input Text    name=password     1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
  

6. InsertUserNamePassWordInvalid
	Sleep    1s
	Input Text    name=username     admin
    Input Text    name=password     123456
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
   

7. InsertAll
	Sleep    1s
	Input Text    name=username     admin	
    Input Text    name=password     1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    