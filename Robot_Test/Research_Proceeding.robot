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
    ClickElement    xpath=//a[text()[contains(.,'Proceeding')]]

 
1. EmptyAll
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button



2. InsertTitle of periodical (EN)
	
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  Leaders Who Create the Happy Workplace
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

3. InsertTitle of periodical (TH)
	
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ผู้นำที่ทำให้องค์การมีความสุข
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

4. InsertTitle of article (EN)
	
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  Servent Leadership
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

5. InsertTitle of article (TH)
	
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ผู้นำแบบผู้รับใช้
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button


6. Insert Title of article (EN) key THLanguage

   Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input    ผู้นำ

7. Insert Title of article (TH) key ENLanguage

  Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input   Leaders

8. Insert Project/donor (EN) key THLanguage

  Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input   ผู้นำแบบผู้รับใช้

9. Insert Project/donor (TH) key ENLanguage

  Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input   Servent Leadership


10. InsertConference
	
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input    -
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button


11. InsertDate

	Click Element   xpath=//*[@id="form_PC"]/div/div[3]/div[2]/input
	Click Element   xpath=/html/body/div[14]/div[2]/div/table/tbody/tr[2]/td[4]
	Click Element   xpath=/html/body/div[14]/div[1]/div/table/tbody/tr[2]/td[1]
	Click Button    xpath=/html/body/div[14]/div[3]/div/button[1]
		
12. InsertYear of publish

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  2015
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

13. InsertMonth of publish

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  3
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

14. InsertPages

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  10-15
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

15. InsertCluster of research

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  Business
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

16. InsertTrack of research

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  Management
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

17. InsertLevel research

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select//option[@value='1'] 	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

18. InsertAttachments

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select//option[@value=''] 
	Choose File   xpath=.//*[@id='form_PJ']/div/div[4]/div[2]//input     C:/Users/Vulpeculaz/Desktop/Doc1.docx	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

19. InsertKeyword

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select//option[@value='']  
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    Happy Workplace
	set selenium implicit wait      2 seconds
	press key 	xpath=.//*[@id='form_PC']/div/div[8]/div/div/input     \\13
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    Servant Leadership 
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select   
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

20. InsertName

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select//option[@value=''] 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select//option[@value='u#35']    
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]/input     ${EMPTY}
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

21. InsertSequence

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  ${EMPTY}
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select//option[@value=''] 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    ${EMPTY}
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select//option[@value='']    
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]//input     3
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button

22. InsertAll

	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[1]/input  Leaders Who Create the Happy Workplace
	Input Text    xpath=.//*[@id='form_PC']/div/div[1]/div[2]/input  ผู้นำที่ทำให้องค์การมีความสุข
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[1]/input  Servent Leadership
	Input Text    xpath=.//*[@id='form_PC']/div/div[2]/div[2]/input  ผู้นำแบบผู้รับใช้
	Input Text    xpath=.//*[@id='form_PC']/div/div[3]/div[1]/input  -
	Click Element   xpath=//input[@name='date']
	Click Element    xpath=html/body/div[14]/div[2]/div/table/tbody/tr[3]/td[4]
	Click Element    xpath=html/body/div[14]/div[1]/div/table/tbody/tr[2]/td[5]
	Click Button    xpath=html/body/div[14]/div[3]/div/button[1]
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[1]/input  2015
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[2]/input  3
	Input Text    xpath=.//*[@id='form_PC']/div/div[4]/div[3]/input  10-15
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[1]/input  Business 
	Input Text    xpath=.//*[@id='form_PC']/div/div[5]/div[2]/input  Management
	Click Element  xpath=.//*[@id='form_PC']/div/div[6]/div/select//option[@value='1']
	Choose File   xpath=.//*[@id='form_PJ']/div/div[4]/div[2]//input    C:/Users/Vulpeculaz/Desktop/Doc1.docx	 
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    Happy Workplace
	set selenium implicit wait      2 seconds
	press key 	xpath=.//*[@id='form_PC']/div/div[8]/div/div/input     \\13
	Input Text    xpath=.//*[@id='form_PC']/div/div[8]/div/div/input    Servant Leadership 
	Click Element  xpath=.//*[@id='form_PC']/div/div[9]/div/div[1]/select//option[@value='u#35']    
	Input Text    xpath=.//*[@id='form_PC']/div/div[9]/div/div[2]//input     3
	Click Button    xpath=.//*[@id='form_PC']/div/div[10]/button




