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


1.Insignia EmptyAll

    Click Element    xpath=//span[text()[contains(.,'เครื่องราชทาน')]]
	Wait Until Page Contains  ใส่ข้อมูลเครื่องราชทาน
    Click Element  xpath=//select[@name="usr_id"]
	Click Button    xpath=//button[@type="submit"]

2.Insignia Choose User 
	sleep  5
	Click Element    xpath=//span[text()[contains(.,'เครื่องราชทาน')]]
	Wait Until Page Contains  ใส่ข้อมูลเครื่องราชทาน
    Click Element  xpath=//select[@name="usr_id"]/option[@value='1']
	sleep  5
	Click Button    xpath=//button[@type="submit"]





