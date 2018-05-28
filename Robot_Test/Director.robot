*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Jobs Experience 
    Open Browser   http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Directors')]]
    Wait Until Page Contains  กรอกข้อมูลการเป็นกรรมการ


1. AllEmpty

  Input Text    name=directorEN    ${EMPTY}
  Input Text    name=directorTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 


2. InsertDirectorName (EN)

  Input Text    name=directorEN    BUU Programing
  Input Text    name=directorTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 



3. InsertDirectorName (TH)

  Input Text    name=directorEN    ${EMPTY}
  Input Text    name=directorTH    โปรแกรมมิ่ง
  Click Element  xpath=//select[@name="year"]
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 



4. InsertYear

  Input Text    name=directorEN    ${EMPTY}
  Input Text    name=directorTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]/option[@value="2014"]
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 


5. InsertLocation (EN)

  Input Text    name=directorEN    ${EMPTY}
  Input Text    name=directorTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=locationEN    BUU
  Input Text    name=locationTH    ${EMPTY}
  Click Button    xpath=//button[@type="submit"] 
  

6. InsertLocation (TH)

  Input Text    name=directorEN    ${EMPTY}
  Input Text    name=directorTH    ${EMPTY}
  Click Element  xpath=//select[@name="year"]
  Input Text    name=locationEN    ${EMPTY}
  Input Text    name=locationTH    มหาวิทยาลัยบูรพา
  Click Button    xpath=//button[@type="submit"] 

  
7. Insert DirectorName(EN) key THLanguage

  Input Text    name=directorEN    นักร้อง


8. Insert DirectorName (TH) key ENGLanguage

  Input Text    name=directorTH    Singer
  
9. Insert Location(EN) key THLanguage

  Input Text    name=locationEN    นักร้อง
  
10. Insert Location (TH) key ENGLanguage

  Input Text    name=locationTH    Singer


11. InsertAll 

  Input Text    name=directorEN    BUU Programing
  Input Text    name=directorTH    โปรแกรมมิ่ง
  Click Element  xpath=//select[@name="year"]/option[@value="2014"]
  Input Text    name=locationEN    BUU
  Input Text    name=locationTH    มหาวิทยาลัยบูรพา
  Click Button    xpath=//button[@type="submit"] 





   











