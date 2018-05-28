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


1.MainNavigation : User Management EmptyAll
   
    ClickElement    xpath=//span[text()[contains(.,'จัดการข้อมูลผู้ใช้')]]
	Wait Until Page Contains  Insert User
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]/option[@value="user"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2     ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]
	

2. InsertUsername (EN) 
    
	Input Text    name=uaut_username     Robottest
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2     ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]

3. InsertUsername (EN) key THLanguage
    
	Input Text    name=uaut_username     พีช
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2     ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]



4. InsertUser Authority
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]/option[@value="user"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2     ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]

5. InsertPassword
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     1234
	Input Text    name=uaut_password2     ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]

6. InsertRe-Password
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2     1234
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]


7. InsertPassword does not match
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     1234
	Input Text    name=uaut_password2     1235
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]



8. InsertFirst Name (TH)
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2    ${EMPTY}
	Input Text    name=uaut_tfname     กุสุมา
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]

9. InsertLast Name (TH)
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2    ${EMPTY}
	Input Text    name=uaut_tfname      ${EMPTY}
	Input Text    name=uaut_tlname     พิกุลแก้ว
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]

10. InsertFirst Name (EN)
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2    ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     Kusuma
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]

11. InsertLast Name (EN)
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2    ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     Pikulkaew
	Click Element  xpath=//select[@name="status_teacherStatus"]
	Click Button    xpath=//button[@type="submit"]
	

12. InsertStatus
    
	Input Text    name=uaut_username     ${EMPTY}
	Click Element  xpath=//select[@name="aut_authority"]
	Input Text    name=uaut_password     ${EMPTY}
	Input Text    name=uaut_password2    ${EMPTY}
	Input Text    name=uaut_tfname     ${EMPTY}
	Input Text    name=uaut_tlname     ${EMPTY}
	Input Text    name=uaut_efname     ${EMPTY}
	Input Text    name=uaut_elname     ${EMPTY}
	Click Element  xpath=//select[@name="status_teacherStatus"]/option[@value="teach"]
	Click Button    xpath=//button[@type="submit"]


13. InsertFirst Name (TH) key ENLauage

	Input Text    name=uaut_tfname     Kusuma

14. InsertLast Name (TH) key ENLauage

	Input Text    name=uaut_tlname     Pikulkaew

15. InsertFirst Name (EN) key THLauage

	Input Text    name=uaut_efname     กุสุมา

16. InsertLast Name (EN) key THLauage

	Input Text    name=uaut_elname     พิกุลแก้ว


17. InsertAll
	Input Text    name=uaut_username     Robottest
	Click Element  xpath=//select[@name="aut_authority"]/option[@value="user"]
	Input Text    name=uaut_password     1234
	Input Text    name=uaut_password2    1234
	Input Text    name=uaut_tfname     โรบอท
	Input Text    name=uaut_tlname     เทส
	Input Text    name=uaut_efname     Robot
	Input Text    name=uaut_elname     test
	Click Element  xpath=//select[@name="status_teacherStatus"]/option[@value="teach"]
	Click Button    xpath=//button[@type="submit"]