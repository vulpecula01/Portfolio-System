*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Jobs Experience 
    Open Browser   http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Teaching Experience')]]
    Wait Until Page Contains  ข้อมูลประสบการณ์สอน 


1. AllEmpty

  Click Element  xpath=//select[@name="year"]
  Click Element  xpath=//select[@name="semeter"]
  Click Element  xpath=//select[@name="subject"]
  Click Button    xpath=//button[@type="submit"] 


2. InsertYear

  Click Element  xpath=//select[@name="year"]/option[@value="2014"]
  Click Element  xpath=//select[@name="semeter"]
  Click Element  xpath=//select[@name="subject"]
  Click Button    xpath=//button[@type="submit"] 



3. InsertSemeter

  Click Element  xpath=//select[@name="year"]
  Click Element  xpath=//select[@name="semeter"]/option[@value="2"]
  Click Element  xpath=//select[@name="subject"]
  Click Button    xpath=//button[@type="submit"] 



4. InsertSubject

  Click Element  xpath=//select[@name="year"]
  Click Element  xpath=//select[@name="semeter"]
  Click Element  xpath=//select[@name="subject"]/option[@value="3"]
  Click Button    xpath=//button[@type="submit"] 


5. InsertAll 

  Click Element  xpath=//select[@name="year"]/option[@value="2014"]
  Click Element  xpath=//select[@name="semeter"]/option[@value="2"]
  Click Element  xpath=//select[@name="subject"]/option[@value="3"]
  Click Button   xpath=//button[@type="submit"] 





   











