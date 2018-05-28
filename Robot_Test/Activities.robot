*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Activities
    Open Browser   http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Activities')]]
    Wait Until Page Contains  ข้อมูลกิจกรรม


1. AllEmpty

  Click Element  xpath=//select[@name="yearFrom"]
  Input Text    name=jobexENG    ${EMPTY}
  Input Text    name=jobexTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 


2. InsertStart

  Click Element  xpath=//select[@name="yearFrom"]/option[@value="2014"]
  Input Text    name=jobexENG    ${EMPTY}
  Input Text    name=jobexTH     ${EMPTY}
  Click Button    xpath=//button[@type="submit"]



3. InsertActivities(Eng)

  Click Element  xpath=//select[@name="yearFrom"]
  Input Text    name=jobexENG   Singer
  Input Text    name=jobexTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"]  



4. InsertActivities(TH)

  Click Element  xpath=//select[@name="yearFrom"]
  Input Text    name=jobexENG    ${EMPTY}
  Input Text    name=jobexTH    ร้องเพลง
  Click Button    xpath=//button[@type="submit"] 


5. Insert Jobs Experience (TH) key ENGLanguage

  Input Text    name=jobexENG    นักร้อง


6. Insert Jobs Experience (EN) key ENGLanguage

  Input Text    name=jobexTH    Singer


7. InsertAll 

  Click Element  xpath=//select[@name="yearFrom"]/option[@value="2014"]
  Input Text    name=jobexENG   Singer
  Input Text    name=jobexTH    นักร้อง
  Click Button    xpath=//button[@type="submit"] 





   











