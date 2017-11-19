<?php
// Table schemas

$col = array();

$alias['symptons']['J'] = "Jaundice";
$alias['symptons']['N'] = "Nausea";
$alias['symptons']['LA'] = "Loss of appetite";
$alias['symptons']['A'] = "Ascites/swollen abdomen";
$alias['symptons']['EL'] = "Enlargement of the liver";
$alias['symptons']['S'] = "Spiders";
$alias['symptons']['I'] = "Itching";
$alias['symptons']['V'] = "Vomiting";
$alias['symptons']['E'] = "Edema";
$alias['symptons']['WL'] = "Weight loss";
$alias['symptons']['BE'] = "Bleeding from dilated veins in the esophagus";
$alias['symptons']['F'] = "Fever";
$alias['symptons']['VA'] = "Varices";
$alias['symptons']['BU'] = "Bile in urine";
$alias['symptons']['ET'] = "Excessive thirst/Dry mouth";
$alias['symptons']['HS'] = "High temperature and shivering attacks";
$alias['symptons']['LH'] = "Light-headedness or fainting";
$alias['symptons']['VB'] = "Vomiting blood or a sludge-like material";
$alias['symptons']['PH'] = "Portal hypertension";
$alias['symptons']['FU'] = "Frequent urination";
$alias['symptons']['EH'] = "Excessive hunger";

$alias['history']['AA'] = "Alcohol abuse";
$alias['history']['WD'] = "Wilson disease";
$alias['history']['HM'] = "Hemochromatosis";
$alias['history']['ID'] = "Insulin resistance and type 2 diabetes";
$alias['history']['HV'] = "Hepatitis B,C,D";

$alias['lab']['TB'] = "Total Bilirubin";
$alias['lab']['AL'] = "Albumin";
$alias['lab']['GGT'] = "GGT";
$alias['lab']['PT'] = "Prothrombin time";
$alias['lab']['GOT'] = "Glutamic Oxalacetic Transaminate";
$alias['lab']['GPT'] = "Glutamic Pyruvic Transaminase";
$alias['lab']['LDH'] = "Lactate Dehydrase";
$alias['lab']['BUN'] = "Blood Urea Nitrogen";
$alias['lab']['MCV'] = "Mean Corpuscular Volume of red blood cell";
$alias['lab']['MCH'] = "Mean Corpuscular Haemoglobin";
$alias['lab']['CRT'] = "Creatinine";
$alias['lab']['AR'] = "AST/ALT ratio";
$alias['lab']['HBS'] = "HBsAg";
$alias['lab']['HBE'] = "HBeAg";
$alias['lab']['AHC'] = "Anti-HCV";
$alias['lab']['AHB'] = "Anti-HBe";
$alias['lab']['A2M'] = "Alpha-2-macroglobulin";
$alias['lab']['HG'] = "Haptoglobulin";
$alias['lab']['PC'] = "Platelet count";
$alias['lab']['APP'] = "Apolipoprotein A1";
$alias['lab']['MT'] = "MMPs and TIMP-1";
$alias['lab']['LN'] = "Laminin";
$alias['lab']['HA'] = "Hyaluronic acid";
$alias['lab']['UC'] = "Urine copper";
$alias['lab']['C'] = "Cholesterol";
$alias['lab']['AFP'] = "α-AFP";
$alias['lab']['TS'] = "Transferrin saturation";
$alias['lab']['SF'] = "Serum ferritin";

$alias['cognitive']['DC'] = "Difficulty concentrating";
$alias['cognitive']['PF'] = "Psychomotor function";
$alias['cognitive']['MC'] = "Mental Disorientation or Confusion";
$alias['cognitive']['IM'] = "Impaired short- or long-term memory";
$alias['cognitive']['IA'] = "Impaired attention";
$alias['cognitive']['IJ'] = "Impaired judgment";
$alias['cognitive']['AC'] = "Altered level of consciousness";
$alias['cognitive']['H'] = "Hallucinations";
$alias['cognitive']['HE'] = "Hepatic encephalopathy";

$alias['physical_exm']['LT'] = "Liver Tenderness";
$alias['physical_exm']['SD'] = "Skin discoloration";
$alias['physical_exm']['ED'] = "Eye discoloration";
$alias['physical_exm']['RP'] = "Red and blotchy palms/feet";
$alias['physical_exm']['SL'] = "Swelling in legs and ankles";
$alias['physical_exm']['P'] = "Paleness";
$alias['physical_exm']['SM'] = "Slow, sluggish, lethargic movement";
$alias['physical_exm']['HL'] = "Hair loss";
$alias['physical_exm']['SJ'] = "Swelling in the joints (arthritis)";
$alias['physical_exm']['SC'] = "The skin may have a bronze or grey colour";

$alias['physiological']['FA'] = "Fatigue";
$alias['physiological']['D'] = "Depression";
$alias['physiological']['FM'] = "Fluctuating moods";
$alias['physiological']['SE'] = "Sleep disturbances";
$alias['physiological']['AN'] = "Anxiety";
$alias['physiological']['AG'] = "Agitation";

 $col['symptons'] = "Disease,J,N,LA,A,EL,S,I,V,E,WL,BE,F,VA,BU,ET,HS,LH,VB,PH,FU,EH";

 $col['history'] = "Disease,AA,WD,HM,ID,HV";

 $col['lab'] = "Disease,TB,AL,GGT,PT,GOT,GPT,LDH,BUN,MCV,MCH,CRT,AR,HBS,HBE,AHC,AHB,A2M,HG,PC,APP,MT,LN,HA,UC,C,AFP,TS,SF";

 $col['cognitive'] = "Disease,DC,PF,MC,IM,IA,IJ,AC,H,HE";

 $col['physical_exm'] = "Disease,LT,SD,ED,RP,SL,P,SM,HL,SJ,SC";

 $col['physiological'] = "Disease,FA,D,FM,SE,AN,AG";



 $col['final'] = "Disease,symptons,history,lab,cognitive,physical_exm,physiological";

 $col['finalOutput'] = "Disease,Hepatitis,Alcoholic_liver,Primary_biliary_cirrhosis,Liver_fibrosis,Liver_cirrhosis,Liver_cancer,Hemrochromatis";

$diseases = array('Hepatitis','Alcoholic_liver','Primary_biliary_cirrhosis','Liver_fibrosis','Liver_cirrhosis','Liver_cancer','Hemrochromatis');

$tables = array('symptons','history','lab','cognitive','physical_exm','physiological');



// Bit values for table data

$BitVal = array();

$BitVal['symptons']['Hepatitis'] =
array(1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0);
$BitVal['symptons']['Alcoholic_liver'] =
array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0);
$BitVal['symptons']['Primary_biliary_cirrhosis'] =
array(0, 0, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['symptons']['Liver_fibrosis'] =
array(1, 1, 1, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['symptons']['Liver_cirrhosis'] =
array(1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0);
$BitVal['symptons']['Liver_cancer'] =
array(1, 1, 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0);
$BitVal['symptons']['Hemrochromatis'] =
array(1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1);

$BitVal['history']['Hepatitis'] =
array(0, 0, 0, 0, 0);
$BitVal['history']['Alcoholic_liver'] =
array(1, 0, 0, 0, 0);
$BitVal['history']['Primary_biliary_cirrhosis'] =
array(0, 0, 0, 0, 0);
$BitVal['history']['Liver_fibrosis'] =
array(1, 0, 0, 0, 0);
$BitVal['history']['Liver_cirrhosis'] =
array(1, 1, 1, 1, 1);
$BitVal['history']['Liver_cancer'] =
array(1, 1, 1, 0, 0);
$BitVal['history']['Hemrochromatis'] =
array(0, 0, 0, 0, 0);

$BitVal['cognitive']['Hepatitis'] =
array(0, 1, 0, 0, 1, 0, 0, 0, 0);
$BitVal['cognitive']['Alcoholic_liver'] =
array(1, 0, 1, 1, 0, 1, 1, 1, 0);
$BitVal['cognitive']['Primary_biliary_cirrhosis'] =
array(1, 1, 0, 0, 0, 0, 0, 0, 0);
$BitVal['cognitive']['Liver_fibrosis'] =
array(0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['cognitive']['Liver_cirrhosis'] =
array(1, 0, 1, 1, 0, 0, 0, 0, 1);
$BitVal['cognitive']['Liver_cancer'] =
array(0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['cognitive']['Hemrochromatis'] =
array(0, 0, 0, 0, 0, 0, 0, 0, 0);

$BitVal['lab']['Hepatitis'] =
array(1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['lab']['Alcoholic_liver'] =
array(1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['lab']['Primary_biliary_cirrhosis'] =
array(1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0);
$BitVal['lab']['Liver_fibrosis'] =
array(1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0);
$BitVal['lab']['Liver_cirrhosis'] =
array(1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['lab']['Liver_cancer'] =
array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0);
$BitVal['lab']['Hemrochromatis'] =
array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1);

$BitVal['physical_exm']['Hepatitis'] =
array(1, 1, 1, 0, 0, 0, 0, 0, 0, 0);
$BitVal['physical_exm']['Alcoholic_liver'] =
array(1, 1, 0, 1, 0, 1, 1, 0, 0, 0);
$BitVal['physical_exm']['Primary_biliary_cirrhosis'] =
array(1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['physical_exm']['Liver_fibrosis'] =
array(1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$BitVal['physical_exm']['Liver_cirrhosis'] =
array(1, 0, 0, 1, 1, 0, 0, 1, 0, 0);
$BitVal['physical_exm']['Liver_cancer'] =
array(1, 0, 0, 0, 1, 0, 0, 0, 0, 0);
$BitVal['physical_exm']['Hemrochromatis'] =
array(1, 1, 1, 0, 0, 0, 0, 0, 1, 1);

$BitVal['physiological']['Hepatitis'] =
array(1, 1, 1, 1, 1, 0);
$BitVal['physiological']['Alcoholic_liver'] =
array(1, 1, 1, 0, 0, 1);
$BitVal['physiological']['Primary_biliary_cirrhosis'] =
array(1, 0, 0, 0, 0, 0);
$BitVal['physiological']['Liver_fibrosis'] =
array(1, 0, 0, 0, 0, 0);
$BitVal['physiological']['Liver_cirrhosis'] =
array(1, 1, 0, 1, 0, 0);
$BitVal['physiological']['Liver_cancer'] =
array(1, 0, 0, 0, 0, 0);
$BitVal['physiological']['Hemrochromatis'] =
array(1, 1, 0, 0, 0, 0);


$article['Hepatitis'] = '		<div class="display-4 mb-4">Hepatitis</div>
		<p>
			Hepatitis A is mostly spread through infected food and water.
			<div class="card m-3">
				<img class="card-img-top " src="/gallery/img/hepatitis.jpg" alt="Card image cap">
			</div>
      The following steps can help avoid infection, especially when traveling.
      <ul class="list-unstyled">
        <li>Wash hands with soap after using the bathroom.</li>
        <li>Only consume food that has just been cooked.</li>
        <li>Only drink commercially bottled water, or boiled water if you\'re unsure of local sanitation.</li>
        <li>Only eat peelable fruits if you are in a location with unreliable sanitation.</li>
        <li>Only eat raw vegetables if you are sure they have been cleaned or disinfected thoroughly.</li>
        <li>Get a vaccine for HAV before traveling to places where hepatitis may be endemic.</li>
        <li>Do not share needles, toothbrushes, or manicure equipment.</li>
        <li>Make sure equipment is well-sterilized for any skin piercing.</li>
        <li>Consume alcohol with moderation.</li>
        <li>Do not inject illegal drugs.</li>
      <ul>
		</p>
';

$article['Alcoholic_liver'] = '<div class="display-4 mb-4">Alcoholic liver</div>
<p>
  <div class="card m-3">
    <img class="card-img-top " src="/gallery/img/liver-chrosis.jpg" alt="Card image cap">
  </div>

  Risk Factors
  <ul class="list-unstyled">
    <li>The main risk factors for alcoholic liver disease are</li>
    <li>Quantity and duration of alcohol use (usually > 8 yr)</li>
    <li>Sex</li>
    <li>Genetic and metabolic traits</li>
    <li>Obesity</li>
  </ul>

  Treatment
  <ul class="list-unstyled">
    <li>Stopping drinking alcohol</li>
    <li>Treatment for ARLD involves stopping drinking alcohol. This is known as abstinence, which can be vital, depending on what stage the condition is at.</li>
    <li>Self-help groups</li>
  </ul>
    Many people with alcohol dependence find it useful to attend self-help groups to help them stop drinking.
     One of the most well-known is Alcoholics Anonymous, but there are many other groups that can help.
</p>';
$article['Primary_biliary_cirrhosis'] = '		<div class="display-4 mb-4">Primary Biliary Cirrhosis</div>
		<p>
			<div class="card m-3">
				<img class="card-img-top " src="/gallery/img/primary.jpg" alt="Card image cap">
			</div>
			What is primary biliary cholangitis (PBC)?
<br>
			Primary biliary cholangitis (PBC) used to be called primary biliary cirrhosis
			 and is a type of liver disease caused by damage to the bile ducts in the liver.
			Much like other forms of liver disease, PBC permanently damages the liver as tissue
			is replaced with scar tissue (fibrosis). As more scar tissue develops, the structure and function of the liver are affected.

			Treatment
			<ul class="list-unstyled">
			  <li>Ursodeoxycholic acid (UDCA). Also known as ursodiol (Actigall, Urso), UDCA is a bile acid that helps move bile through your liver.</li>
			  <li>UDCA doesn\'t cure primary biliary cirrhosis, but it may prolong life if started early in the disease and is commonly considered the first line of therapy.</li>
			  <li>Liver transplant. When treatments no longer control primary biliary cirrhosis and the liver begins to fail, a liver transplant may help prolong life.</li>
			  <li>A liver transplant is a procedure to remove your diseased liver and replace it with a healthy liver from a donor.</li>
			</ul>
		</p>
';
$article['Liver_fibrosis'] = '<div class="display-4 mb-4">Liver Fibrosis</div>
		<p>
			<div class="card m-3">
				<img class="card-img-top " src="/gallery/img/liver-fibro.jpg" alt="Card image cap">
			</div>
			What is Liver Fibrosis?
			<br>
			Fibrosis of the liver is excessive accumulation of scar tissue that results from ongoing inflammation and liver cell death that occurs in most types of chronic liver diseases.
			 Nodules, abnormal spherical areas of cells, form as dying liver cells are replaced by regenerating cells. This regeneration of cells causes the liver to become hard. Fibrosis
			 refers to the accumulation of tough, fibrous scar tissue in the liver.

			Treatment
			<ul class="list-unstyled">
			  <li>Abstain from drinking alcohol (drinking alcohol may cause further liver damage)</li>
			  <li>Treat any infections promptly (avoid people who are ill, use good hygiene by frequent hand washing, get vaccinated for hepatitis A and B, influenza and pneumonia)</li>
			  <li>Eat a healthy, well balanced diet including lots of fruits and vegetables/avoid raw seafood (good nutrition is important to liver health). People with liver concerns should avoid eating raw seafood due to the risk of infection.</li>
			  <li>Eat a low sodium/low fat diet (excess salt can cause the body to increase fluid retention in the abdomen and legs)</li>
			  <li>If diagnosed with hepatitis, take medications to treat it which can slow disease progression and possibly reverse fibrosis</li>
			</ul>
		</p>
';
$article['Liver_cirrhosis'] = '		<div class="display-4 mb-4">Liver Cirrhosis</div>
		<p>
			Cirrhosis is a complication of many liver diseases characterized by abnormal structure and function of the liver.
			The diseases that lead to cirrhosis do so because they injure and kill liver cells, after which the inflammation and repair that is associated with the dying liver cells causes scar tissue to form.
			The liver cells that do not die multiply in an attempt to replace the cells that have died.
			This results in clusters of newly-formed liver cells (regenerative nodules) within the scar tissue.
			 <div class="card m-3">
 				<img class="card-img-top " src="/gallery/img/Liver_Cirrhosis.png" alt="Card image cap">
 			</div>

			Treatment
			<ul class="list-unstyled">
			  <li>If the cirrhosis is diagnosed early enough, damage can be minimized by treating the underlying cause.</li>
			  <li>Alcohol dependency (alcoholism) treatment - it is important for the patient to stop drinking if their cirrhosis was caused by long-term,
regular heavy alcohol consumption. In many cases, the doctor will recommend a treatment program for alcoholism.</li>
			  <li>Medications - the patient may be prescribed drugs to control liver cell damage caused by hepatitis B or C.</li>
			</ul>
		</p>
';
$article['Liver_cancer'] = '		<div class="display-4 mb-4">Liver Cancer</div>
		<p>
			Usually, when people speak of liver cancer, they mean a cancer that has begun somewhere else in the body and then spread to the liver.
			 This is called secondary or metastatic disease or liver metastases. Due to its very high blood flow, as well as other factors still
			poorly understood, the liver is one of the most common places for metastases to take root.
			<div class="card m-3">
 				<img class="card-img-top " src="/gallery/img/liver-cancer.jpg" alt="Card image cap">
 			</div>

			Treatment
			<ul class="list-unstyled">
			  <li>Surgical treatments</li>
			  <li>Radiofrequency ablation: using a probe with electrodes that kills cancerous tissue</li>
			  <li>Partial hepatectomy: removing part of the liver, ranging from a smaller wedge to an entire lobe</li>
			  <li>Total hepatectomy and liver transplant: removing the whole liver and replacing it with one from an organ donor</li>
			</ul>
		</p>
';
$article['Hemrochromatis'] = '<div class="display-4 mb-4">Hemochromatosis</div>
<p>How hemochromatosis affects your organs? <br>
  A hormone called hepcidin, secreted by the liver, normally controls how iron is used and absorbed in the body, as well as how excess iron is stored in various organs.
   In hemochromatosis, the normal role of hepcidin is disrupted, causing your body to absorb more iron that it needs.
<br><br>
  There are several types of genetic hemochromatosis. These include: Type I or Classic (HHC); Type II a, b or Juvenile (JHC);
  Type III or Transferrin Receptor Mutation; and Type IV or Ferroportin Mutation.
  <div class="card m-3">
    <img class="card-img-top " src="/gallery/img/hemochroma.jpg" alt="Card image cap">
  </div>

  Treatment
  <ul class="list-unstyled">
    <li>The treatment for hemochromatosis is a simple process called phlebotomy. In phlebotomy, blood is drawn from the veins in the arm — similar to donating blood at a blood bank.</li>
    <li>Removing blood removes the iron it contains and is the most effective means of getting rid of excess iron. The blood cells removed are quickly replaced by new ones.</li>
    <li>Treatment depends on the patient’s iron levels. Usually, a pint of blood is drawn once or twice a month until the iron levels are within the normal range.
This process can take months.</li>
  </ul>
</p>';

?>
