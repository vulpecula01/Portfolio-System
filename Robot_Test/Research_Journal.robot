*** Settings ***
Library           Selenium2Library

*** Test Cases ***

MainNavigation : Research 
    Open Browser    http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Researches')]]
    Wait Until Page Contains  Insert Research
    Click Element    xpath=//a[text()[contains(.,'Journal')]]




 
1. EmptyAll
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal  ${EMPTY}
	Input Text    name=year  ${EMPTY}
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


2. InsertTitle of periodical (EN)

	Input Text    name=titleEn    Journal of Energy Research
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal  ${EMPTY}
	Input Text    name=year  ${EMPTY}
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


3. InsertTitle of periodical (TH)

	Input Text    name=titleEn    ${EMPTY}
	Input Text    name=titleTh  วารสารวิจัยพลังงาน
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal  ${EMPTY}
	Input Text    name=year  ${EMPTY}
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


4. InsertTitle of article (EN)
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  Test about Energy literacy 
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal  ${EMPTY}
	Input Text    name=year  ${EMPTY}
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]

5. InsertTitle of article (TH)
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  การศึกษาเปรียบเทียบความรู้ความเข้าใจ
	Input Text    name=journal  ${EMPTY}
	Input Text    name=year  ${EMPTY}
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]

6. Insert Title of article (EN) key THLanguage

   Input Text    name=titleEn  Proceedings

7. Insert Title of article (TH) key ENLanguage

  Input Text    name=titleTh   ระบบการจัดการข้อมูล

8. Insert Project/donor (EN) key THLanguage

  Input Text    name=projectEn   Grand Pacific

9. Insert Project/donor (TH) key ENLanguage

  Input Text    name=projectTh   แกรนด์แปซิฟิค



10. InsertJournals name
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal    Test about Energy literacy of High school student
	Input Text    name=year  ${EMPTY}
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


11. InsertYear of publish
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    2016
	Input Text    name=month  ${EMPTY}
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


12. InsertMonth of publish
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	2
	Input Text    name=page  ${EMPTY}
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]

13. InsertYear/Vol./Pages
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	2016/1/12-18
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


14. InsertCluster of research
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  high school student
	Input Text    name=track  ${EMPTY}	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


15. InsertTrack of research
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track   Biology	
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


16. InsertLevel research
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track   ${EMPTY}
	Click Element  xpath=//select[@name="level"]/option[@value="1"]
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


17. InsertAttachments
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track   ${EMPTY}
	Click Element  xpath=//select[@name="level"]
	Choose File   name=file 	 C:/Users/Vulpeculaz/Desktop/Doc1.docx
	Input Text    xpath=.//*[@id='form_JN']/div/div[8]/div/div/input     ${EMPTY}
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


18. InsertKeyword
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track   ${EMPTY}
	Click Element  xpath=//select[@name="level"] 
	Input Text    xpath=//*[@id="form_JN"]/div/div[8]/div/input//following::input[1]   Energy   
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select  
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]

19. InsertName
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track   ${EMPTY}
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=//*[@id="form_JN"]/div/div[8]/div/input//following::input[1]   ${EMPTY}  
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select//option[@value='u#35'] 
	Input Text    name=researchSequence[0]  ${EMPTY}
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


20. InsertSequence
	
	Input Text    name=titleEn  ${EMPTY}
	Input Text    name=titleTh  ${EMPTY}
	Input Text    name=projectEn  ${EMPTY}
	Input Text    name=projectTh  ${EMPTY}
	Input Text    name=journal     ${EMPTY}
	Input Text    name=year    ${EMPTY}
	Input Text    name=month  	${EMPTY}
	Input Text    name=page  	${EMPTY}	
	Input Text    name=cluster  ${EMPTY}
	Input Text    name=track   ${EMPTY}
	Click Element  xpath=//select[@name="level"]
	Input Text    xpath=//*[@id="form_JN"]/div/div[8]/div/input//following::input[1]   ${EMPTY}    
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select//option[@value=''] 
	Input Text    xpath=.//*[@id='form_JN']/div/div[9]/div/div[2]/input    2
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]


21. InsertAll
	
	Input Text    name=titleEn   Journal of Energy Research
	Input Text    name=titleTh   วารสารวิจัยพลังงาน
	Input Text    name=projectEn  Test about Energy literacy
	Input Text    name=projectTh  การศึกษาเปรียบเทียบความรู้ความเข้าใจและทัศนคติด้านพลังงาน
	Input Text    name=journal     Test about Energy literacy of High school student
	Input Text    name=year    2016
	Input Text    name=month  	2
	Input Text    name=page  	2016/1/12-18
	Input Text    name=cluster  HighSchool 
	Input Text    name=track   Biology	
	Click Element  xpath=//select[@name="level"]/option[@value="1"]
	Choose File   name=file 	 C:/Users/Vulpeculaz/Desktop/Doc1.docx
	Input Text    xpath=//*[@id="form_JN"]/div/div[8]/div/input//following::input[1]   Energy 
	Click Element  xpath=.//*[@id='form_JN']/div/div[9]/div/div[1]/select//option[@value='u#35'] 
	Input Text    xpath=.//*[@id='form_JN']/div/div[9]/div/div[2]//input    2
	Click Button    xpath=//button[@class="btn btn-success pull-right submit_JN"]





