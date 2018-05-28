*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Jobs Experience 
    Open Browser   http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Jobs Experience')]]
    Wait Until Page Contains  กรอกข้อมูลประสบการณ์การทำงาน 


1. AllEmpty

  Click Element  xpath=//select[@name="yearFrom"]
  Click Element  xpath=//select[@name="yearTo"]
  Input Text    name=jobexTH    ${EMPTY}
  Input Text    name=jobexEN    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 


2. InsertStart(A.D.)

  Click Element  xpath=//select[@name="yearFrom"]/option[@value="2014"]
  Click Element  xpath=//select[@name="yearTo"]
  Input Text    name=jobexTH    ${EMPTY}
  Input Text    name=jobexEN     ${EMPTY}
  Click Button    xpath=//button[@type="submit"]


3. InsertStop(A.D.)

  Click Element  xpath=//select[@name="yearFrom"]/option[@value=""]
  Click Element  xpath=//select[@name="yearTo"]/option[@value="9999"]
  Input Text    name=jobexTH     ${EMPTY}
  Input Text    name=jobexEN     ${EMPTY}
  Click Button    xpath=//button[@type="submit"]



4. InsertExperience(TH)

  Click Element  xpath=//select[@name="yearFrom"]/option[@value=""]
  Click Element  xpath=//select[@name="yearTo"]/option[@value=""]
  Input Text    name=jobexTH   นักร้อง
  Input Text    name=jobexEN     ${EMPTY}
  Click Button    xpath=//button[@type="submit"]  



5. InsertJobsExperience(EN)

  Click Element  xpath=//select[@name="yearFrom"]/option[@value=""]
  Click Element  xpath=//select[@name="yearTo"]/option[@value=""]
  Input Text    name=jobexTH    ${EMPTY}
  Input Text    name=jobexEN    Singer
  Click Button    xpath=//button[@type="submit"] 


6. Insert Jobs Experience (TH) key ENGLanguage

  Input Text    name=jobexTH    Singer


7. Insert Jobs Experience (EN) key ENGLanguage

  Input Text    name=jobexEN    นักร้อง


8. InsertAll 

  Click Element  xpath=//select[@name="yearFrom"]/option[@value="2014"]
  Click Element  xpath=//select[@name="yearTo"]/option[@value="9999"]
  Input Text    name=jobexTH   นักร้อง
  Input Text    name=jobexEN    Singer
  Click Button    xpath=//button[@type="submit"] 





   











