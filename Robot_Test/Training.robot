*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Training
    Open Browser   http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Training')]]
    Wait Until Page Contains  ข้อมูลการอบรม


1. AllEmpty

  Input Text    name=trainEN    ${EMPTY}
  Input Text    name=trainTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=hour    ${EMPTY}
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 


2. InsertTrainingName (EN)

  Input Text    name=trainEN    JAVA
  Input Text    name=trainTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=hour    ${EMPTY}
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 



3. InsertTrainigName (TH)

  Input Text    name=trainEN    ${EMPTY}
  Input Text    name=trainTH    จาวา
  Click Element  xpath=//select[@name="year"]
  Input Text    name=hour    ${EMPTY}
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 



4. InsertYear

	Input Text    name=trainEN    ${EMPTY}
  Input Text    name=trainTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]/option[@value="2014"]
  Input Text    name=hour    ${EMPTY}
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 
  
  
5. InsertHour

	Input Text    name=trainEN    ${EMPTY}
  Input Text    name=trainTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=hour    24
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 


6. InsertLocation (EN)

  Input Text    name=trainEN    ${EMPTY}
  Input Text    name=trainTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=hour    ${EMPTY}
  Input Text    name=locationEN    BUU
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 
  

7. InsertLocation (TH)

  Input Text    name=trainEN    ${EMPTY}
  Input Text    name=trainTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=hour    ${EMPTY}
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    มหาวิทยาลัยบูรพา
  Click Button    xpath=//button[@type="submit"] 

  
8. Insert TrainingName(EN) key THLanguage

  Input Text    name=trainEN    จาวา


9. Insert TrainingName (TH) key ENGLanguage

  Input Text    name=trainTH    JAVA
  
10. Insert Hour key varchar

  Input Text    name=hour    test
  
11. Insert Location(EN) key THLanguage

  Input Text    name=locationEN    บูราพา
  
12. Insert Location (TH) key ENGLanguage

  Input Text    name=locationTH    BUU


13. InsertAll 

  Input Text    name=trainEN   JAVA
  Input Text    name=trainTH    จาวา
  Click Element  xpath=//select[@name="year"]/option[@value="2014"]
    Input Text    name=hour    24
  Input Text    name=locationEN    BUU
  Input Text    name=locationTH    มหาวิทยาลัยบูรพา
  Click Button    xpath=//button[@type="submit"] 





   











