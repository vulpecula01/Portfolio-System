*** Settings ***
Library           Selenium2Library


*** Test Cases ***

MainNavigation : Education Background
    Open Browser    http://10.80.34.5:9001/index.php/c_login    GC
    Input Text    name=username    admin	
    Input Text    name=password    1111
    Click Button    xpath=//button[@type="submit" and text()="Sign In"]
    Wait Until Page Contains    InformaticsPortfolio
    Click Element    xpath=//a[text()[contains(.,'Education Background')]]
    Wait Until Page Contains  กรอกข้อมูลประวัติการศึกษา


1.EmptyAll

  Click Element  xpath=//select[@name="edl_id"]
  Click Element    xpath=//select[@id="inputDegree"]
  Click Element  xpath=//select[@name="maj_id"]
  Click Element  xpath=//select[@name="edb_yeargraduate"]
  Click Element  xpath=//select[@name="cou_id"]
  Click Element    xpath=//select[@id="inputInstitute"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]  



2. InsertEducationLevel

  Click Element  xpath=//select[@name="edl_id"]/option[@value="1"]
  Click Element    xpath=//select[@id="inputDegree"]
  Click Element  xpath=//select[@name="maj_id"]
  Click Element  xpath=//select[@name="edb_yeargraduate"]
  Click Element  xpath=//select[@name="cou_id"]
  Click Element    xpath=//select[@id="inputInstitute"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]


3. InsertDegree

  Click Element  xpath=//select[@name="edl_id"]/option[@value="1"]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value="1"]
  Click Element  xpath=//select[@name="maj_id"]
  Click Element  xpath=//select[@name="edb_yeargraduate"]
  Click Element  xpath=//select[@name="cou_id"]
  Click Element    xpath=//select[@id="inputInstitute"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]


4. InsertMajor

  Click Element  xpath=//select[@name="edl_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value=""]
  Click Element  xpath=//select[@name="maj_id"]/option[@value="2"]
  Click Element  xpath=//select[@name="edb_yeargraduate"]
  Click Element  xpath=//select[@name="cou_id"]
  Click Element    xpath=//select[@id="inputInstitute"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]

5. InsertYear of graduation (A.D.)

  Click Element  xpath=//select[@name="edl_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value=""]
  Click Element  xpath=//select[@name="maj_id"]/option[@value=""]
  Click Element  xpath=//select[@name="edb_yeargraduate"]/option[@value="2016"]
  Click Element  xpath=//select[@name="cou_id"]
  Click Element    xpath=//select[@id="inputInstitute"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]

6. InsertCountry

  Click Element  xpath=//select[@name="edl_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value=""]
  Click Element  xpath=//select[@name="maj_id"]/option[@value=""]
  Click Element  xpath=//select[@name="edb_yeargraduate"]/option[@value=""]
  Click Element  xpath=//select[@name="cou_id"]/option[@value="1"]
  Click Element    xpath=//select[@id="inputInstitute"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]

7. InsertInstitute

  Click Element  xpath=//select[@name="edl_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value=""]
  Click Element  xpath=//select[@name="maj_id"]/option[@value=""]
  Click Element  xpath=//select[@name="edb_yeargraduate"]/option[@value=""]
  Click Element  xpath=//select[@name="cou_id"]/option[@value="1"]
  Click Element    xpath=//select[@id="inputInstitute"]/option[@value="10"]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]

8. InsertThesis topics (TH)

  Click Element  xpath=//select[@name="edl_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value=""]
  Click Element  xpath=//select[@name="maj_id"]/option[@value=""]
  Click Element  xpath=//select[@name="edb_yeargraduate"]/option[@value=""]
  Click Element  xpath=//select[@name="cou_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputInstitute"]/option[@value=""]
  Input Text    name=edb_tthesistopic  การสร้างรายการเพลงโดยใช้การกรองร่วมแบบเซลชั่น
  Input Text    name=edb_ethesistopic  ${EMPTY}
  Click Button    xpath=//button[@type="submit"]

9. InsertThesis topics (EN)

  Click Element  xpath=//select[@name="edl_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputDegree"]/option[@value=""]
  Click Element  xpath=//select[@name="maj_id"]/option[@value=""]
  Click Element  xpath=//select[@name="edb_yeargraduate"]/option[@value=""]
  Click Element  xpath=//select[@name="cou_id"]/option[@value=""]
  Click Element    xpath=//select[@id="inputInstitute"]/option[@value=""]
  Input Text    name=edb_tthesistopic  ${EMPTY}
  Input Text    name=edb_ethesistopic  Song list generating using incremental session based collaborative 
  Click Button    xpath=//button[@type="submit"]

10 Insert Thesis topics (TH) key ENGLanguage

  Input Text    name=edb_tthesistopic   SSSSS

11 Insert Thesis topics (EN) key THLanguage

  Input Text    name=edb_ethesistopic   การรรรรรร

12. InsertAll

  Click Element  xpath=.//*[@id='inputEduc']
  Click Element  xpath=//select[@id="inputDegree"]/option[@value="1"]
  Click Element  xpath=//select[@name="maj_id"]/option[@value="2"]
  Click Element  xpath=//select[@name="edb_yeargraduate"]/option[@value="2017"]
  Click Element  xpath=//select[@name="cou_id"]/option[@value="1"]
  Click Element    xpath=//select[@id="inputInstitute"]/option[@value="10"]
  Select From List by Label    xpath=//select[@id="inputInstitute"]    Burapha University (มหาวิทยาลัยบูรพา ) 
  Input Text    name=edb_tthesistopic  การสร้างรายการเพลงโดยใช้การกรองร่วมแบบเซลชั่น
  Input Text    name=edb_ethesistopic   Song list generating using incremental session based collaborative filtering 
  Click Button    xpath=//button[@type="submit"]


 