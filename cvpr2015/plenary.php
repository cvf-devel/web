<?php
	$which_page = "plenary";
	include('common_header.php');
?>

<center>
<span class="cvprpageheader">CVPR 2015 Plenary Speakers</span><br /><br />
</center>

<span class="cvprparagraphheader">Wednesday June 10, 10:30am-12:25pm</span><br /><br />

<table width="100%">
<tr>
<td width="48%" valign="top">
<center>
<img src="images/lecun.png" />
</center>
</td>

<td width="2%"></td>
<td width="2%" style="border-left: 1px solid #ccc;"></td>

<td width="48%" valign="top">
<center>
<img src="images/gallant.png" />
</center>
</td>
</tr>

<tr>
<td width="48%" valign="top">
<b>What's Wrong with Deep Learning?</b> [<a href="files/lecun-20150610-cvpr-keynote.pdf">slides</a>]<br /><a href="http://yann.lecun.com/"><a href="http://yann.lecun.com/">Yann LeCun</a><br />Facebook AI Research &amp; New York University<br /><p>Deep learning methods have had a profound impact on a number of areas in recent years, including natural image understanding and speech recognition. Other areas seem on the verge of being similarly impacted, notably natural language processing, biomedical image analysis, and the analysis of sequential signals in a variety of application domains. But deep learning systems, as they exist today, have many limitations.</p>

<p>First, they lack mechanisms for reasoning, search, and inference. Complex and/or ambiguous inputs require deliberate reasoning to arrive at a consistent interpretation. Producing structured outputs, such as a long text, or a label map for image segmentation, require sophisticated search and inference algorithms to satisfy complex sets of constraints. One approach to this problem is to marry deep learning with structured prediction (an idea first presented at CVPR 1997). While several deep learning systems augmented with structured prediction modules trained end to end have been proposed for OCR, body pose estimation, and semantic segmentation, new concepts are needed for tasks that require more complex reasoning.</p>

<p>Second, they lack short-term memory. Many tasks in natural language understanding, such as question-answering, require a way to temporarily store isolated facts. Correctly interpreting events in a video and being able to answer questions about it requires remembering abstract representations of what happens in the video. Deep learning systems, including recurrent nets, are notoriously inefficient at storing temporary memories. This has led researchers to propose neural nets systems augmented with separate memory modules, such as LSTM, Memory Networks, Neural Turing Machines, and Stack-Augmented RNN. While these proposals are interesting, new ideas are needed.</p>

<p>Lastly, they lack the ability to perform unsupervised learning. Animals and humans learn most of the structure of the perceptual world in an unsupervised manner. While the interest of the ML community in neural nets was revived in the mid-2000s by progress in unsupervised learning, the vast majority of practical applications of deep learning have used purely supervised learning. There is little doubt that future progress in computer vision will require breakthroughs in unsupervised learning, particularly for video understanding, But what principles should unsupervised learning be based on?</p>

<p>Preliminary works in each of these areas pave the way for future progress in image and video understanding.</p>
<br />

<p><b>Biography:</b></p>

<p>Yann LeCun is Director of AI Research at Facebook, and Silver
Professor of Data Science, Computer Science, Neural Science, and
Electrical Engineering at New York University, affiliated with the NYU
Center for Data Science, the Courant Institute of Mathematical
Science, the Center for Neural Science, and the Electrical and
Computer Engineering Department.</p>

<p>He received the Electrical Engineer Diploma from Ecole Superieure
d'Ingenieurs en Electrotechnique et Electronique (ESIEE), Paris in
1983, and a PhD in Computer Science from Universite Pierre et Marie
Curie (Paris) in 1987. After a postdoc at the University of Toronto,
he joined AT&amp;T Bell Laboratories in Holmdel, NJ in 1988. He became
head of the Image Processing Research Department at AT&amp;T
Labs-Research in 1996, and joined NYU as a professor in 2003, after a
brief period as a Fellow of the NEC Research Institute in
Princeton. From 2012 to 2014 he directed NYU's initiative in data
science and became the founding director of the NYU Center for Data
Science. He was named Director of AI Research at Facebook in late 2013
and retains a part-time position on the NYU faculty.</p>

<p>His current interests include AI, machine learning, computer
perception, mobile robotics, and computational neuroscience. He has
published over 180 technical papers and book chapters on these topics
as well as on neural networks, handwriting recognition, image
processing and compression, and on dedicated circuits and
architectures for computer perception. The character recognition
technology he developed at Bell Labs is used by several banks around
the world to read checks and was reading between 10 and 20% of all the
checks in the US in the early 2000s. His image compression technology,
called DjVu, is used by hundreds of web sites and publishers and
millions of users to access scanned documents on the Web. Since the
late 80's he has been working on deep learning methods, particularly
the convolutional network model, which is the basis of many products
and services deployed by companies such as Facebook, Google,
Microsoft, Baidu, IBM, NEC, AT&amp;T and others for image and video
understanding, document recognition, human-computer interaction, and
speech recognition.</p>

<p>LeCun has been on the editorial board of IJCV, IEEE PAMI, and IEEE
Trans. Neural Networks, was program chair of CVPR'06, and is chair of
ICLR 2013 and 2014. He is on the science advisory board of Institute
for Pure and Applied Mathematics, and has advised many large and small
companies about machine learning technology, including several
startups he co-founded. He is the lead faculty at NYU for the
Moore-Sloan Data Science Environment, a $36M initiative in
collaboration with UC Berkeley and University of Washington to develop
data-driven methods in the sciences. He is the recipient of the 2014
IEEE Neural Network Pioneer Award.</p>
</td>

<td width="2%"></td>
<td width="2%" style="border-left: 1px solid #ccc;"></td>

<td width="48%" valign="top">
<b>Reverse Engineering the Human Visual System</b><br /><a href="http://www.gallantlab.org/">Jack L. Gallant</a><br />University of California at Berkeley<br /><p>The human brain is the most sophisticated image processing system known, capable of impressive feats of recognition and discrimination under challenging natural conditions. Reverse-engineering the brain might enable us to design artificial systems with the same capabilities. My laboratory uses a data-driven system identification approach to tackle this reverse-engineering problem. Our approach consists of four broad stages. First, we use functional MRI to measure brain activity while people watch naturalistic movies. We divide these data into two parts, one use to fit models and one for testing model predictions. Second, we use a system identification framework (based on multiple linearizing feature spaces) to model activity measured at each point in the brain. Third, we inspect the most accurate models to understand how the brain represents low-, mid- and high-level information in the movies. Finally, we use the estimated models to decode brain activity, reconstructing the structural and semantic content in the movies. Any effort to reverse-engineer the brain is inevitably limited by the spatial and temporal resolution of brain measurements, and at this time the resolution of human brain measurements is relatively poor. Still, as measurement technology progresses this framework could inform development of biologically-inspired computer vision systems, and it could aid in development of practical new brain reading technologies.</p>
<br />

<p><b>Biography:</b></p>

<p>Jack Gallant is Chancellor's Professor of Psychology at the
University of California at Berkeley. He is affiliated with the
graduate programs in Bioengineering, Biophysics, Neuroscience and
Vision Science. He received his Ph.D. from Yale University and did
post-doctoral work at the California Institute of Technology and
Washington University Medical School. His research program focuses on
computational modeling of the human brain. These models accurately
describe how the brain encodes information during complex,
naturalistic tasks, and they show how information about the external
and internal world are mapped systematically across the surface of the
cerebral cortex. These models can also be used to decode information
in the brain in order to reconstruct mental experiences. Gallant's
brain decoding algorithm was one of Times Magazine's Inventions of the
Year in 2011, and he appears frequently on radio and
television. Further information about ongoing work in the Gallant lab,
links to talks and papers, and links to an online interactive brain
viewer can be found at the lab web page: <a
href="http://gallantlab.org">http://gallantlab.org</a>.</p>

</td>
</tr>
</table>
<br />

<?php
include('common_footer.php');
?>
