*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Award
    Open Browser    http://10.80.34.5:9001/index.php/c_login   GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Awards')]]
    Wait Until Page Contains  การรับรางวัล


1. EmptyAll
	
	Input Text    name=titleEn   ${EMPTY}
    Input Text    name=titleTh    ${EMPTY}
    Click Element  xpath=//select[@name="year"]
    Input Text    name=factorEn   ${EMPTY}
    Input Text    name=factorTh   ${EMPTY}
    Click Button    xpath=//button[@type="submit"]

2.InsertAward title(EN)

	Input Text    name=titleEn   singing contest
    Input Text    name=titleTh    ${EMPTY}
    Click Element  xpath=//select[@name="year"]
    Input Text    name=factorEn   ${EMPTY}
    Input Text    name=factorTh   ${EMPTY}
    Click Button    xpath=//button[@type="submit"]


3.InsertAward title(TH)

	Input Text    name=titleEn   ${EMPTY}
    Input Text    name=titleTh    ประกวดร้องเพลง
    Click Element  xpath=//select[@name="year"]
    Input Text    name=factorEn   ${EMPTY}
    Input Text    name=factorTh   ${EMPTY}
    Click Button    xpath=//button[@type="submit"]

4. InsertYear of award
	
	Input Text    name=titleEn   ${EMPTY}
    Input Text    name=titleTh    ${EMPTY}
    Click Element  xpath=//select[@name="year"]/option[@value="2016"]
    Input Text    name=factorEn   ${EMPTY}
    Input Text    name=factorTh   ${EMPTY}
    Click Button    xpath=//button[@type="submit"]

5. InsertInstitutional factors that award(EN)
	
	Input Text    name=titleEn   ${EMPTY}
    Input Text    name=titleTh    ${EMPTY}
    Click Element  xpath=//select[@name="year"]
    Input Text    name=factorEn   Loykratong festival
    Input Text    name=factorTh   ${EMPTY}
    Click Button    xpath=//button[@type="submit"]

6. InsertInstitutional factors that award(TH)

	Input Text    name=titleEn   ${EMPTY}
    Input Text    name=titleTh    ${EMPTY}
    Click Element  xpath=//select[@name="year"]
    Input Text    name=factorEn   ${EMPTY}
    Input Text    name=factorTh   ประเพณีลอยกระทง
    Click Button    xpath=//button[@type="submit"]


7. Insert Award title (EN) key THLanguage

   Input Text    name=titleEn   ประกวดร้องเพลง

8. Insert Award title (TH) key ENLanguage

  Input Text    name=titleTh  singing contest

9. Institutional factors that award (EN) key THLanguage

  Input Text    name=factorEn   ประเพณีลอยกระทง 

10. Institutional factors that award (TH) key ENLanguage

  Input Text    name=factorTh  Loykratong festival
  

11. InsertAll

	Input Text    name=titleEn   singing contest
    Input Text    name=titleTh    ประกวดร้องเพลง
    Click Element  xpath=//select[@name="year"]/option[@value="2016"]
    Input Text    name=factorEn   Loykratong festival
    Input Text    name=factorTh   ประเพณีลอยกระทง
    Click Button    xpath=//button[@type="submit"]
    

