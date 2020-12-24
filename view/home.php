<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button w3-hover-white"><img src="view/img/logo.png" class="logo"></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="" class="w3-bar-item w3-button active w3-text-blue">HOME</a>
            <a href="" class="w3-bar-item w3-button">DATA</a>
            <a href="" class="w3-bar-item w3-button w3-blue">LOG IN</a>
        </div>
    </div>
</div>

<header class="w3-display-container w3-content" style="max-width:1495px;" id="home">
    <img class="w3-image headerIMG" src="view/img/header.jpg" width="1495" height="800">
    <div class="w3-display-middle w3-container w3-center">
        <h1 class="w3-text-white headerFont">COVID-19 INFORMATION CENTER</h1>
        <p class="w3-text-white">
            Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
            Most people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment.
        </p><br>
        <a href="#content" class="w3-button w3-blue">READ MORE <i class="fa fa-angle-double-right"></i></a>
        <a href="#dataAll" class="w3-button w3-blue">VIEW OVERALL <i class="fa fa-angle-double-right"></i></a>
    </div>
</header>

<div class="w3-content w3-padding" style="max-width: 1495px;">
    <div class="w3-container" id="dataAll">
        <div class="w3-center w3-xxlarge w3-border-bottom" style="width: 1000px; margin: auto">
            <h2 style="font-weight: 500;">OVERALL CASES</h2>
        </div>
        <div class="w3-row w3-margin-top w3-card-4 w3-margin-bottom" style="width: 1000px; margin:auto">
            <div class="w3-quarter w3-light-blue 13 m6">
                <h3 class="w3-center">Confirmed</h3>
                <h1 class="w3-center"><?php echo $count->getAll() ?></h1>
            </div>

            <div class="w3-quarter w3-blue 13 m6">
                <h3 class="w3-center">Recovered</h3>
                <h1 class="w3-center"><?php echo $count->getRecovered() ?></h1>
            </div>

            <div class="w3-quarter w3-teal 13 m6">
                <h3 class="w3-center">Recovered</h3>
                <h1 class="w3-center"><?php echo $count->getActive() ?></h1>
            </div>

            <div class="w3-quarter w3-dark-grey 13 m6">
                <h3 class="w3-center">Recovered</h3>
                <h1 class="w3-center"><?php echo $count->getDeath() ?></h1>
            </div>
        </div>
    </div>

    <div class="w3-container" id="content">
        <div class="w3-center w3-xxlarge w3-border-bottom">
            <h2 style="font-weight: 500;">COVID-19 Response</h2>
        </div>
        <div class="w3-container paragraph">
            <h3 class="w3-text-blue" style="font-weight: 500;">Korean government’s response system</h3>
            <p>
                Since raising the country’s Crisis Alert Level to the highest (Level 4) in February 23, 2020,
                the Korean government has assembled the Central Disaster and Safety Countermeasure Headquarters headed by the Prime Minister to bolster
                government-wide responses to COVID-19.
            </p>
            <p>
                Given the specialty and expertise required in infectious disease response, the Central Disease Control Headquarters
                (KCDC, Korea Centers for Disease Control & Prevention) serves as the command center of the prevention and control efforts.
                The Vice Head 1 of the Central Disaster and Safety Countermeasure Headquarters, who also serves as the Head of the Central Disaster
                Management Headquarters (Minister of Health and Welfare), assists the Central Disease Control Headquarters (Head: Director of the Korea
                Centers for Disease Control and Prevention).
            </p>
            <p>
                The Minister of Interior and Safety, head of the Pan-government Countermeasures Support Headquarters,
                assumes Vice Head 2 of the Central Disaster and Safety Countermeasure Headquarters to provide necessary assistance such as
                coordination between the central and local governments.
            </p>
            <p>
                Each local government establishes Local Disaster and Safety Management Headquarters led by the heads of the local
                governments to secure an adequate number of Infectious Disease Hospitals and beds. If the countermeasure required is beyond the
                capacity of local governments, the central government may support necessary resources including beds, personnel, and supplies.
            </p>
            <img src="view/img/content1.JPG" class="center">

            <h3 class="w3-text-blue" style="font-weight: 500;">Preventing the inflow and spread of the virus</h3>
            <h4><i class="fa fa-angle-right"></i> Preventing importation of the virus through border screening</h4>
            <h5><i class="fa fa-square-o"></i> Special Entry Procedure </h5>
            <p>
                The Korean government introduced an entry ban on foreign nationals from Hubei Province, strengthened
                visa screening of travelers from China and Japan, and designated China (including Hong Kong, Macau), Italy, and Iran as
                ‘quarantine inspection required areas’, to tighten screening of travelers from these countries.
            </p>
            <p>
                In particular, from February 4, 2020, the Korean government applied the Special Entry Procedure to all travelers from China,
                and expanded the procedure to be applied to travelers from Hong Kong and Macau (February 12), Japan (March 9), Italy and Iran (March 12),
                five major European countries (France, Germany, Spain, U.K., and Netherlands; March 15), the entire European continent (March 16), and all
                parts of the world (March 19).
            </p>
            <p>
                Furthermore, from March 19, all inbound travelers (Korean and foreign nationals) receive temperature screening and fill out the Health Questionnaire
                and Special Quarantine Declaration in accordance with the Special Entry Procedure. All travelers subject to the special procedure are allowed to enter
                the nation after their contact information and address of residence in Korea is verified. They are also required to install either the “Self-Quarantine
                Safety Protection App” or “Self-Diagnosis App” on their phones to monitor if they show symptoms that indicate infection of COVID-19 such as fever during
                their stay in Korea. All inbound travelers must install either of the two applications, to check their health status and record if they develop any symptom
                on a daily basis for 15 days beginning from the day of arrival. In addition, the list of incoming travelers is provided to each local government (city or
                province) in an effort to strengthen the monitoring system.
            </p>
            <span class="w3-text-red">Self-health check symptoms: fever (37.5 or higher) or feverish feeling, cough, sore throat, respiratory difficulties or breathlessness</span>
            <br><br>

            <h5><i class="fa fa-square-o"></i> Special Entry Procedure </h5>
            <p>
                In light of the increasing number of confirmed cases especially among inbound travelers, from 00:00,
                April 1 all travelers entering Korea are subject to a 14-day quarantine from the day after arrival.
            </p>
            <span class="w3-text-red">For example, if you arrived on 1 June you are required to stay under mandatory quarantine until 12:00 of 15 June.</span>
            <p>
                In addition, from 00:00 on April 13, inbound travelers from the U.S. (Korean nationals and foreign-nationals on long-term visas) are subject
                to self-quarantine and must receive diagnostic tests within three days of their quarantine period.
            </p>

            <h6 class="w3-text-blue"><i class="fa fa-circle"></i> Symptomatic travelers</h6>
            <p>
                All travelers entering Korea (both Korean and foreign nationals) are tested if they exhibit fever or respiratory symptom
                identified at entry screening. Travelers who test positive for COVID-19 are transferred to a hospital or residential treatment center.
                Korean nationals or foreign nationals on long-term visas who test negative are placed under self-quarantine (14 days, Self-Quarantine Safety
                Protection App to be installed) and foreign nationals on short-term visas are placed under quarantine at facilities (14 days, Self-Diagnosis
                App to be installed).
            </p>

            <h6 class="w3-text-blue"><i class="fa fa-circle"></i> Asymptomatic travelers</h6>
            <p>
                Asymptomatic Korean and foreign nationals from Europe and the U.S. on long-term visas are subject to self-quarantine (14 days, Self-Quarantine
                Safety Protection App to be installed) and tested at a public health center within three days of arrival. Asymptomatic Korean nationals and foreign
                nationals on long-term visas from countries other than the U.S. and European countries are subject to self-quarantine (14 days, Self-Quarantine Safety
                Protection App to be installed) and tested at a public health center within 14 days.
            </p>

            <p>
                Asymptomatic foreign nationals from Europe and the US on short-term visas are subject to facility quarantine (14 days, Self-Quarantine Safety
                Protection App and Self-Diagnosis App to be installed). Asymptomatic foreign nationals from countries other than the US and European countries on
                short-term visas are subject to facility quarantine (14 days, Self-Diagnosis App to be installed) and tested at a public health clinic within 14 days.
            </p>

            <p>
                Travelers exempt from quarantine—those holding A1 (Diplomat) or A2 (Government official) visas or Quarantine Exemption Certificate issued by the Korean
                Embassy or Consulate General prior to the entry—receive tests and wait for the results at a temporary screening facility. If they test negative, they are
                subject to active monitoring for 14 days from the day of arrival by installing the Self-Diagnosis App of the Ministry of Health and Welfare
            </p>

            <p>
                For inbound travelers, testing and treatment expenses are covered by the Korean government but livelihood support are not provided.

                If a traveler entering Korea does not comply with the quarantine guidelines, s/he may face up to 1 year of imprisonment or a KRW 10 million fine for
                violating the Quarantine Act and Infectious Disease Control and Prevention Act. In accordance with the Immigration Act, foreign nationals violating the
                regulations may face deportation or ban on entry into Korea, etc.
            </p>
            <span class="w3-text-red"> Travelers will receive assistance to install either the Self-Quarantine Safety Protection App or Self-Diagnosis App before departure or while waiting for Special Entry Procedures.</span>
            <img src="view/img/content2.JPG" class="center">
            <img src="view/img/content3.JPG" class="center">
            <span class="w3-text-red">
                Quarantine period: Quarantined until 24:00 on the 14th day of arrival (date of arrival+14 days)
                (For example, a traveler who arrives on April 1 is issued a notice of self-quarantine until 24:00 on April 15, when 14 days have elapsed)]
            </span>

            <h4><i class="fa fa-angle-right"></i> Early detection and containment</h4>
            <p>
                Early detection is key to preventing the virus from spreading. The Korean government has set up screening stations to increase access to
                diagnostic tests and conduct fast and wide testing to detect confirmed cases.
            </p>
            <h5><i class="fa fa-square-o"></i> COVID-19 screening stations </h5>
            <p>
                Screening stations provide consultation to people showing symptoms of COVID-19 such as cough or fever before they visit medical facilities.
                As of April 8, 2020, 638 public health centers and medical institutions operate screening stations, of which 95 percent (606) are equipped to
                collect specimens onsite.
            </p>

            <h5><i class="fa fa-square-o"></i> Diagnostic tests </h5>
            <p>
                There are currently 118 testing facilities—23 public facilities, 81 medical institutions, and 14 entrusted facilities—that provide diagnostic tests.
                As of April, a total of five diagnostic reagents were granted Emergency Use Authorization.

                Since scaling up testing facilities and diagnostic reagents, the maximum daily testing capacity increased from 3,000 people in
                February to approximately 20,000 people as of April.
            </p>

            <h4><i class="fa fa-angle-right"></i> Preventing spread of the virus through epidemiological investigations and quarantine of contacts</h4>
            <h5><i class="fa fa-square-o"></i> Epidemiological investigation </h5>
            <p>
                The central and local governments respond to COVID-19 cases by tracing the source of infection through prompt epidemiological investigation and quarantine
                of contacts.

                For epidemiological investigation, basic information including whereabouts of confirmed cases are collected through an interview with
                confirmed cases. If needed, interview with healthcare workers and family members may additionally take place. In case the acquired information
                is insufficient, more objective data (medical records, mobile GPS, CCTV footages, credit card records, etc.) may be collected and verified.

                The contacts identified during the investigation are required to attend healthcare education, have their symptoms monitored, and stay in
                self-quarantine. Information on the whereabouts of confirmed cases are uploaded on websites in order to prevent any additional infection.
            </p>

            <h5><i class="fa fa-square-o"></i> Contact management </h5>
            <p>
                Family members, housemates, and other contacts identified by epidemiological investigation on the patient’s travel and infection routes are
                subject to self-quarantine for the maximum incubation period (14 days) beginning from the day after the date of contact with a confirmed patient
                and have their symptoms monitored.
            </p>
            <span class="w3-text-red">
                For example, a person who last came into contact with a confirmed patient on April 1 start self-quarantine until 24:00 on April 15,
                as April 2 is deemed the first day of the 14-day self-quarantine period.
            </span>
            <p>
                The Ministry of Interior and Safety and local governments thoroughly manage those under self-quarantine on a one-to-one basis.
                Those in self-quarantine are prohibited from leaving the country for 14 days regardless of their health status. Those who violate self-quarantine
                guidelines may face up to a 10 million KRW fine or one year of imprisonment.
            </p>
        </div>
    </div>
</div>