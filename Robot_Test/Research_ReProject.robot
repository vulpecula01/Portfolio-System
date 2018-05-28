*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Research 
    Open Browser    http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Research')]]
    Wait Until Page Contains  Insert Research



1. EmptyAll

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

2. InsertTitle of article (EN)

	Input Text    name=projectTitleEn  Proceedings of the 4th National Conference on Information Technology
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

3. InsertTitle of article (TH)

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ระบบจัดการข้อมูลวัฒนธรรม
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

4. InsertProject/donor (EN)

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  Grand Pacific Sovereign Resort & Spa
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

5. InsertProject/donor (TH)

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  แกรนด์แปซิฟิคโซเวอเรน รีสอร์ทแอนด์สปา
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

6. Insert Title of article (EN) key THLanguage

   Input Text    name=projectTitleEn  ระบบจัดการข้อมูลวัฒนธรรม

7. Insert Title of article (TH) key ENLanguage

  Input Text    name=projectTitleTh   Proceedings

8. Insert Project/donor (EN) key THLanguage

  Input Text    name=donorEn   แกรนด์แปซิฟิค

9. Insert Project/donor (TH) key ENLanguage

  Input Text    name=donorTh  Grand Pacific


10. InsertYear for Research funding

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund    2012
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]	 
	
11. InsertType of research

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]/option[@value="1"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]
	
12. InsertStatus

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]/option[@value=""] 
	Click Element  xpath=//select[@name="status"]/option[@value="2"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

13. InsertAbstract

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]/option[@value=""] 
	Click Element  xpath=//select[@name="status"]/option[@value=""]
	Input Text    name=abstract  เกี่ยวกับจัดการข้อมูลวัฒนธรรม
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

14. InsertChoose File

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Choose File   name=file 	 C:/Users/Vulpeculaz/Desktop/Doc1.docx
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]


15. InsertKeyword

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Input Text    xpath=//input[@name='key']//following::input[1]  National    
	Press Key      xpath=//input[@name='key']//following::input[1]    \\13
	Click Element  xpath=//select[@name="researchType[0]"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]


16. InsertType of researcher

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]//option[@value="3"]
	Click Element  xpath=//select[@name="researchName[0]"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

17. InsertName

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]//option[@value="u#35"]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

18. InsertPercent

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]/option[@value=""]
	Input Text    name=researchPercent[0]  70
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

19. InsertInstitution

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]/option[@value=""]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  มหาวิทยาลัยบูรพา
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

20. InsertFunding

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]/option[@value=""]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  1000
	Click Element  xpath=//select[@name="intIntegrating[0]"] 
	Click Button   xpath=//button[@type="submit"]

21. InsertDate1

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]/option[@value=""]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element   xpath=//input[@name='fundDate[]']
	Click Element    xpath=html/body/div[12]/div[1]/div/table/tbody/tr[2]/td[5]
	Click Element    xpath=html/body/div[12]/div[2]/div/table/tbody/tr[4]/td[5]
	Click Button    xpath=html/body/div[12]/div[3]/div/button[1]
	Click Element  xpath=//select[@name="intIntegrating[0]"]/option[@value=""] 
	Click Button   xpath=//button[@type="submit"]



22. InsertDate2

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]/option[@value=""]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element   xpath=.//*[@id='form_PJ']/div/div[8]/div/div[1]/input   
	Click Element    xpath=html/body/div[13]/div[2]/div/table/tbody/tr[3]/td[2]
	Click Element    xpath=html/body/div[13]/div[1]/div/table/tbody/tr[2]/td[4]
	Click Button    xpath=html/body/div[13]/div[3]/div/button[1]
	Click Element  xpath=//select[@name="intIntegrating[0]"]/option[@value=""] 
	Click Button   xpath=//button[@type="submit"]

23. InsertIntegrating

	Input Text    name=projectTitleEn  ${EMPTY}
	Input Text    name=projectTitleTh  ${EMPTY}
	Input Text    name=donorEn  ${EMPTY}
	Input Text    name=donorTh  ${EMPTY}
	Input Text    name=yearFund  ${EMPTY}
	Click Element  xpath=//select[@name="type"]
	Click Element  xpath=//select[@name="status"]
	Input Text    name=abstract  ${EMPTY}
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value=""]
	Click Element  xpath=//select[@name="researchName[0]"]/option[@value=""]
	Input Text    name=researchPercent[0]  ${EMPTY}
	Input Text    name=fundInstitution[]  ${EMPTY}
	Input Text    name=fundFunding[]  ${EMPTY}
	Click Element  xpath=//select[@name="intIntegrating[0]"]/option[@value="2"] 
	Click Button   xpath=//button[@type="submit"]

24. InsertAll

	Input Text    name=projectTitleEn  Proceedings of the 4th National Conference on Information Technology
	Input Text    name=projectTitleTh  ระบบจัดการข้อมูลวัฒนธรรม
	Input Text    name=donorEn  Grand Pacific Sovereign Resort & Spa
	Input Text    name=donorTh  แกรนด์แปซิฟิคโซเวอเรน รีสอร์ทแอนด์สปา
	Input Text    name=yearFund  2012
	Click Element  xpath=//select[@name="type"]/option[@value="1"]
	Click Element  xpath=//select[@name="status"]/option[@value="2"]
	Input Text    name=abstract  เกี่ยวกับจัดการข้อมูลวัฒนธรรม
	Choose File   name=file 	 C:/Users/Vulpeculaz/Desktop/Doc1.docx
	Click Element  xpath=//input[@name='key']//following::input[1]
	Click Element  xpath=//select[@name="researchType[0]"]/option[@value="3"]
	Click Element  xpath=//select[@name="researchName[0]"]//option[@value="u#35"]
	Input Text    name=researchPercent[0]  70
	Input Text    name=fundInstitution[]  มหาวิทยาลัยบูรพา
	Input Text    name=fundFunding[]  1000
	Click Element   xpath=//input[@name='fundDate[]']
	Click Element    xpath=html/body/div[12]/div[1]/div/table/tbody/tr[2]/td[5]
	Click Element    xpath=html/body/div[12]/div[2]/div/table/tbody/tr[4]/td[5]
	Click Button    xpath=html/body/div[12]/div[3]/div/button[1]
	Click Element   xpath=.//*[@id='form_PJ']/div/div[8]/div/div[1]/input   
	Click Element    xpath=html/body/div[13]/div[2]/div/table/tbody/tr[3]/td[2]
	Click Element    xpath=html/body/div[13]/div[1]/div/table/tbody/tr[2]/td[4]
	Click Button    xpath=html/body/div[13]/div[3]/div/button[1]
	Click Element  xpath=//select[@name="intIntegrating[0]"]/option[@value="2"] 
	Click Button   xpath=//button[@type="submit"]


