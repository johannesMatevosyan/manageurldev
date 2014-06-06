-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2014 at 11:08 AM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manageurls`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_manager`
--

CREATE TABLE IF NOT EXISTS `db_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header_title` varchar(128) DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL,
  `alpha_num` enum('Alpha','Numeric') NOT NULL,
  `editable_cbx` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `db_manager`
--

INSERT INTO `db_manager` (`id`, `header_title`, `content`, `alpha_num`, `editable_cbx`) VALUES
(47, 'Position', NULL, 'Alpha', 1),
(49, 'email', NULL, 'Alpha', 1),
(54, 'URL', NULL, 'Alpha', 1),
(55, 'Number', NULL, 'Alpha', 0),
(56, 'PR', NULL, 'Alpha', 0),
(57, 'comment', NULL, 'Alpha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE IF NOT EXISTS `excel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `Number` varchar(250) NOT NULL,
  `PR` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=260 ;

--
-- Dumping data for table `excel`
--

INSERT INTO `excel` (`id`, `Position`, `email`, `URL`, `Number`, `PR`, `comment`) VALUES
(1, '155', '', 'http://legalsolutions.thomsonreuters.com/about/editorial-submissions', '77089', '7', 'submit a guest post'),
(2, '415', '', 'http://cargocollective.com/World-Weary/Submission-Guidelines-FAQ', '9351', '7', 'yes'),
(3, '155', '', 'http://cargocollective.com/World-Weary/Submission-Guidelines-FAQ', '9351', '7', 'yes'),
(4, '164', '', 'http://allnurses.com/general-nursing-student/help-need-examples-99834.html', '34899', '7', 'social network '),
(5, '164', '', 'http://adb.anu.edu.au/faqs/', '32962', '7', 'become a author'),
(6, '164', '', 'http://blog.epa.gov/blog/2009/10/toyota-drives-toward-zero-waste%c2%a0/', '117083', '7', 'possible'),
(7, '424', '', 'http://allnurses.com/general-nursing-student/help-need-examples-99834.html', '34899', '7', 'social network '),
(8, '164', '', 'http://deepseanews.com/2012/11/guest-post-the-march-of-science/', '9366', '7', 'guest post in title of posts'),
(9, '424', '', 'http://deepseanews.com/2012/11/guest-post-the-march-of-science/', '9366', '7', 'guest post in title of posts'),
(10, '164', '', 'http://dejanseo.com.au/the-world-research-and-innovation-congress/', '32969', '7', 'submit an article'),
(11, '424', '', 'http://dejanseo.com.au/the-world-research-and-innovation-congress/', '32969', '7', 'submit an article'),
(12, '165', '', 'http://jimdo.com', '96308', '7', 'create a blog'),
(13, '165', '', 'http://legacy.earlham.edu/~markp/elgg_tw/', '97128', '7', 'create a blog'),
(14, '165', '', 'http://pubs.rsc.org/en/Journals/Journal/AY', '9450', '7', 'academic journal'),
(15, '165', '', 'http://blogs.rsc.org/ee/2012/08/06/capacitive-desalination/', '67958', '7', 'submit an article'),
(16, '425', '', 'http://jimdo.com', '96308', '7', 'create a blog'),
(17, '168', '', 'http://oilprice.com/Energy/Gas-Prices/Why-U.S.-Energy-Independence-Means-Pump-Pain.html', '9209', '7', 'write for us'),
(18, '428', '', 'http://oilprice.com/Energy/Gas-Prices/Why-U.S.-Energy-Independence-Means-Pump-Pain.html', '9209', '7', 'write for us'),
(19, '173', '', 'http://opendemocracy.net/openeconomy/tony-curzon-price/g4ss-buckles-is-no-bungler-analysis-of-interview', '100120', '7', 'Submit an Article using form'),
(20, '433', '', 'http://opendemocracy.net/openeconomy/tony-curzon-price/g4ss-buckles-is-no-bungler-analysis-of-interview', '100120', '7', 'Submit an Article using form'),
(21, '433', '', 'http://royalsocietypublishing.org/', '78013', '7', 'manuscript submission'),
(22, '173', '', 'http://royalsocietypublishing.org/', '78013', '7', 'manuscript submission'),
(23, '449', '', 'http://themoderatevoice.com/26740/who-invented-the-automobile-guest-voice/', '9469', '7', 'guest post - guest voice in title'),
(24, '189', '', 'http://themoderatevoice.com/26740/who-invented-the-automobile-guest-voice/', '9469', '7', 'guest post - guest voice in title'),
(25, '453', '', 'http://tikiwiki.org/tiki-forums.php', '105026', '7', 'Become an Author'),
(26, '193', '', 'http://tikiwiki.org/tiki-forums.php', '105026', '7', 'Become an Author'),
(27, '459', '', 'http://traveltourismdirectory.net/', '105288', '7', 'submit article link directory'),
(28, '460', '', 'http://webnode.com', '106436', '7', 'create a free website'),
(29, '199', '', 'http://traveltourismdirectory.net/', '105288', '7', 'submit article link directory'),
(30, '202', '', 'http://webs.com', '106444', '7', 'create a free website'),
(31, '202', '', 'http://wiki.videolan.org', '108738', '7', 'submit article wiki'),
(32, '204', '', 'http://www.cipd.co.uk/toolclicks/management/faqs-terms-accessibility/faqs.aspx', '52595', '7', 'become a contributor'),
(33, '204', '', 'http://www.collegenews.com/res/insurance/car_insurance/student_car_insurance_rates', '121052', '7', 'write for us - signup form'),
(34, '205', '', 'http://www.devshed.com/c/a/Oracle/Introduction-to-SQL/1/', '121222', '7', 'write for us - signup form'),
(35, '205', '', 'http://m.dpreview.com/news/2012/10/18/Sony-firmware-adds-hybrid-af-support-to-emount-lenses-disables-movie-button-NEX-7-SLT-A37-A57-A65-A7', '118758', '7', 'write for us'),
(36, '207', '', 'http://www.googlelunarxprize.org/teams/white-label-space', '9613', '7', 'become a contributor'),
(37, '215', '', 'http://www.hg.org/article.asp?id=7596', '9620', '7', 'submit an article'),
(38, '220', '', 'http://www.lehighvalleylive.com/allentown/', '9665', '7', 'bloggers wanted'),
(39, '221', '', 'http://www.magentocommerce.com/knowledge-base', '122164', '7', 'write for us'),
(40, '223', '', 'http://www.mechanics.com.au/write-for-us/', '122216', '7', 'write for us - OMG'),
(41, '225', '', 'http://www.opensourcecms.com/demo/1/183/Drupal', '115889', '7', 'become a contributor'),
(42, '228', '', 'http://www.prospectmagazine.co.uk/about/frequently-asked-questions/', '54346', '7', 'submit an article'),
(43, '237', '', 'http://www.swimmingworldmagazine.com/lane9/news/World/33849.asp', '34996', '7', 'Write for Us'),
(44, '237', '', 'http://www.goabroad.com/blog/2012/11/20/traveling-abroad-stay-protected-with-travel-health-insurance/', '9608', '7', 'write for us'),
(45, '239', '', 'http://www.issa.int/Resources/International-Social-Security-Review', '81530', '7', 'submit an article'),
(46, '239', '', 'http://www.swansea.ac.uk/undergraduate/student-life/get-involved/', '54814', '7', 'want to write for'),
(47, '254', '', 'http://www.detroitnews.com/', '17', '7', 'press release'),
(48, '254', '', 'http://blog.hemmings.com/', '30', '6', 'possible'),
(49, '1', '', 'http://www.ebscohost.com/for-publishers/for-publishers', '137148', '8', 'content partnership'),
(50, '255', '', 'http://bargainbabe.com/advertise-blog/', '8929', '6', 'guest post - do payday loans'),
(51, '7', '', 'http://www.cartalk.com/content/car-talk-service-advice-power-steering-fluid', '8894', '8', 'unsure guest post'),
(52, '20', '', 'http://www.stuff.co.nz/entertainment/blogs/on-the-box/7673924/Guest-post-Not-excited-for-Glee-S4', '8895', '8', 'unsure guest post'),
(53, '263', '', 'http://www.angrybearblog.com/', '8915', '6', 'Guest Post'),
(54, '32', '', 'http://techcrunch.com/2009/06/23/the-government-comes-through-for-tesla-with-a-465-million-loan-for-its-electric-sedan/', '8893', '8', 'unsure guest post'),
(55, '269', '', 'http://www.earthtechling.com/', '58', '6', 'possible'),
(56, '32', '', 'http://arxiv.org/help/submit', '34846', '8', 'academic journal'),
(57, '32', '', 'http://www.shutterstock.com/cat.mhtml?safesearch=1&search_language=en&search_type=similar&similar_photo_id=574517&tracking_id=543AAD26-8C0F-11E2-8497-108B71D9A14D', '9171', '8', 'cash for image submission'),
(58, '32', '', 'http://www.pnas.org/content/99/2/1017.full', '9018', '8', 'manuscript submission'),
(59, '271', '', 'http://roadandtrack.com', '52', '6', 'possible'),
(60, '33', '', 'http://getfirebug.com/wiki/index.php/How_to_become_a_contributor', '42020', '8', 'become a contributor'),
(61, '33', '', 'http://www.deakin.edu.au/research/stories/2012/10/31/join-the-conversation', '32942', '8', 'become a contributor'),
(62, '33', '', 'http://bigcharts.marketwatch.com/bullet.asp?direction=1&topDate=04%2F16%2F2013%2009%3A30%3A00&botDate=04%2F16%2F2013%2008%3A10%3A00&topIdDoc=1110930007&botIdDoc=1110921801', '135583', '8', 'advertising'),
(63, '273', '', 'http://www.whatcar.com/', '64', '6', 'sent'),
(64, '47', '', 'http://allthingsd.com/20101016/exclusive-former-yahoo-and-microsoft-exec-dossett-to-demand-media/', '135498', '8', 'possible'),
(65, '278', '', 'http://www.cnet.com.au/cartech/', '57', '6', 'possible'),
(66, '278', '', 'http://latimesblogs.latimes.com/money_co/2011/12/online-car-selling-scam-nets-4-million-california-prosecutors-say.html', '43', '6', 'press release'),
(67, '47', '', 'http://www.kqed.org/radio/programs/perspectives/submissions.jsp', '9661', '7', 'radio'),
(68, '49', '', 'http://cit.edu.au/partnerships/industry_connection/2010_october/seven_rules_for_effective_advertising', '32967', '7', 'industry expert submissions'),
(69, '285', '', 'http://under30ceo.com/6-tips-on-money-management-for-young-people/', '8913', '6', 'guest post'),
(70, '52', '', 'http://www.asiapacific.ca/thenationalconversationonasia/blog/arriving-mission-hospital-nepal', '114772', '7', 'become a contributor'),
(71, '53', '', 'http://www.qub.ac.uk/schools/SchoolofPoliticsInternationalStudiesandPhilosophy/AboutUs/Publications/', '54375', '7', 'submit an article'),
(72, '53', '', 'http://www.alia.org.au/alj/', '32985', '7', 'submit an article'),
(73, '290', '', 'http://brazilianbubble.com/opinion-brazils-strained-auto-loan-market/', '8910', '6', 'guest post'),
(74, '290', '', 'http://blog.caranddriver.com/', '28', '6', 'sent'),
(75, '296', '', 'http://matadornetwork.com/community/julesatkins/cambodia-land-of-the-lexus/', '5025', '6', 'become a contributor'),
(76, '53', '', 'http://nadaguides.com', '13', '7', 'sent'),
(77, '53', '', 'http://www.esri.com/news/arcwatch/0810/gis-business-summit.html', '80528', '7', 'submit an article'),
(78, '54', '', 'http://www.mail.newdeal20.com/become-contributor', '8900', '7', 'guest post'),
(79, '304', '', 'http://www.freemoneyfinance.com/', '8919', '6', 'Guest Post'),
(80, '304', '', 'http://higheredwatch.newamerica.net/node/25940', '8911', '6', 'guest post'),
(81, '308', '', 'http://artofmanliness.com/2011/09/20/4-personal-finance-principles-that-would-make-your-grandfather-proud/', '8908', '6', 'guest post'),
(82, '76', '', 'http://www.nextnewdeal.net/reality-check-why-truth-will-protect-social-security', '82421', '7', 'become a contributor'),
(83, '22', '', 'http://www.nextnewdeal.net/reality-check-why-truth-will-protect-social-security', '82421', '7', 'become a contributor'),
(84, '328', '', 'http://ulitzer.com/', '8932', '6', 'guest post'),
(85, '42', '', 'http://www.brisbanetimes.com.au/entertainment/your-big-break-blog-for-brisbanetimescomau-20110802-1i99i.html', '9523', '7', 'bloggers wanted'),
(86, '42', '', 'http://www.ballarat.edu.au/centres/art-and-historical-collection/ballarat-and-district-industrial-heritage-project', '32993', '7', 'become a contributor'),
(87, '96', '', 'http://www.brisbanetimes.com.au/entertainment/your-big-break-blog-for-brisbanetimescomau-20110802-1i99i.html', '9523', '7', 'bloggers wanted'),
(88, '338', '', 'http://ezinearticles.com/?Do-You-Need-A-Car-Title-Loan?&id=5520847', '8906', '6', 'submit article using form'),
(89, '341', '', 'http://goarticles.com/article/Used-Car-Loans-How-to-Obtain/7424336/', '8907', '6', 'submit article using form'),
(90, '49', '', 'http://www.acponline.org/residents_fellows/career_counseling/malpractice_insurance.htm', '78990', '7', 'submit an article'),
(91, '341', '', 'http://wn.com/pigmentation', '8933', '6', 'submit article using form'),
(92, '103', '', 'http://www.acponline.org/residents_fellows/career_counseling/malpractice_insurance.htm', '78990', '7', 'submit an article'),
(93, '63', '', 'http://www.nursingtimes.net/home/clinical-zones/leadership/professionalism-is-the-best-regulator-of-nursing-care/5055309.article', '122494', '7', 'write for us'),
(94, '63', '', 'http://consumerguideauto.howstuffworks.com', '9', '7', 'sent'),
(95, '117', '', 'http://www.nursingtimes.net/home/clinical-zones/leadership/professionalism-is-the-best-regulator-of-nursing-care/5055309.article', '122494', '7', 'write for us'),
(96, '72', '', 'http://www.dpreview.com/lensreviews/nikon_35_1p8g_n15', '9570', '7', 'write for us'),
(97, '72', '', 'http://www.port.ac.uk/departments/services/academicregistry/qualitymanagementdivision/collaborativeprogrammes/oraclenewsletter/', '54303', '7', 'submit an article'),
(98, '125', '', 'http://www.dpreview.com/lensreviews/nikon_35_1p8g_n15', '9570', '7', 'write for us'),
(99, '108', '', 'http://www.kiwiblog.co.nz/2012/04/guest_post_fiscal_prudence_and_transport_priorities.html', '8899', '7', 'guest post'),
(100, '112', '', 'http://www.nasponline.org/membership/faq.aspx', '82315', '7', 'manuscript submission'),
(101, '112', '', 'http://www.dius.gov.uk/mailshots/index.html', '52850', '7', 'submit an article'),
(102, '112', '', 'http://blogs.ft.com/beyond-brics/2012/10/17/guest-post-hungary-from-global-cyberspace-to-local-start-ups/', '9335', '7', 'guest post in title of posts'),
(103, '161', '', 'http://www.kiwiblog.co.nz/2012/04/guest_post_fiscal_prudence_and_transport_priorities.html', '8899', '7', 'guest post'),
(104, '165', '', 'http://www.apogeephoto.com/may2003/altengarten52003.shtml', '120526', '7', 'write for us'),
(105, '116', '', 'http://www.apogeephoto.com/may2003/altengarten52003.shtml', '120526', '7', 'write for us'),
(106, '122', '', 'http://www.deccanchronicle.com/121015/basic-page/contact-us', '9557', '7', 'submit an article'),
(107, '171', '', 'http://www.deccanchronicle.com/121015/basic-page/contact-us', '9557', '7', 'submit an article'),
(108, '125', '', 'http://www.disabilitynow.org.uk/write-for-us', '52840', '7', 'write for us'),
(109, '6', '', 'http://www.deccanchronicle.com/121015/basic-page/contact-us', '9557', '7', 'submit an article'),
(110, '174', '', 'http://www.disabilitynow.org.uk/write-for-us', '52840', '7', 'write for us'),
(111, '129', '', 'http://www.gizmag.com/', '19', '7', 'sent'),
(112, '10', '', 'http://www.gizmag.com/', '19', '7', 'sent'),
(113, '178', '', 'http://www.gizmag.com/', '19', '7', 'sent'),
(114, '148', '', 'http://www.llrx.com/category/1048', '81860', '7', 'submit an article'),
(115, '29', '', 'http://www.llrx.com/category/1048', '81860', '7', 'submit an article'),
(116, '197', '', 'http://www.llrx.com/category/1048', '81860', '7', 'submit an article'),
(117, '150', '', 'http://www.edmunds.com/autoobserver-archive/', '18', '7', 'sent'),
(118, '31', '', 'http://www.edmunds.com/autoobserver-archive/', '18', '7', 'sent'),
(119, '199', '', 'http://www.edmunds.com/autoobserver-archive/', '18', '7', 'sent'),
(120, '153', '', 'http://traveloregon.com/', '120073', '7', 'write for us'),
(121, '155', '', 'http://www.wlv.ac.uk/default.aspx?page=25399', '55362', '7', 'submit an article'),
(122, '202', '', 'http://traveloregon.com/', '120073', '7', 'write for us'),
(123, '160', '', 'http://www.ericweisstein.com/encyclopedias/faq.html', '115200', '7', 'become a contributor'),
(124, '34', '', 'http://traveloregon.com/', '120073', '7', 'write for us'),
(125, '207', '', 'http://www.ericweisstein.com/encyclopedias/faq.html', '115200', '7', 'become a contributor'),
(126, '164', '', 'http://torontoist.com/2009/05/torontoist_and_globe_partner_up/', '136569', '7', 'Contribute'),
(127, '38', '', 'http://torontoist.com/2009/05/torontoist_and_globe_partner_up/', '136569', '7', 'Contribute'),
(128, '211', '', 'http://torontoist.com/2009/05/torontoist_and_globe_partner_up/', '136569', '7', 'Contribute'),
(129, '164', '', 'http://webhostinggeeks.com/blog/guest-blogger-wanted/', '9235', '7', 'guest post'),
(130, '38', '', 'http://webhostinggeeks.com/blog/guest-blogger-wanted/', '9235', '7', 'guest post'),
(131, '211', '', 'http://webhostinggeeks.com/blog/guest-blogger-wanted/', '9235', '7', 'guest post'),
(132, '166', '', 'http://smallbiztrends.com/2011/05/are-you-taking-a-vacation-this-year.html', '9460', '7', 'submit a guest post'),
(133, '40', '', 'http://smallbiztrends.com/2011/05/are-you-taking-a-vacation-this-year.html', '9460', '7', 'submit a guest post'),
(134, '174', '', 'http://www.newamerica.net/blog/higher-ed-watch/2009/guest-post-five-steps-government-can-take-help-private-loan-borrowers-11057', '8902', '7', 'guest post'),
(135, '213', '', 'http://smallbiztrends.com/2011/05/are-you-taking-a-vacation-this-year.html', '9460', '7', 'submit a guest post'),
(136, '48', '', 'http://www.newamerica.net/blog/higher-ed-watch/2009/guest-post-five-steps-government-can-take-help-private-loan-borrowers-11057', '8902', '7', 'guest post'),
(137, '178', '', 'http://nanotechweb.org/cws/article/yournews/33063', '69467', '7', 'journal submission'),
(138, '217', '', 'http://nanotechweb.org/cws/article/yournews/33063', '69467', '7', 'journal submission'),
(139, '52', '', 'http://nanotechweb.org/cws/article/yournews/33063', '69467', '7', 'journal submission'),
(140, '199', '', 'http://occupywallst.org/article/GuestSub1/', '8905', '7', 'guest post - content@occupywallst.org'),
(141, '199', '', 'http://supportforums.blackberry.com/t5/Java-Development/How-to-submit-an-article-to-the-knowledge-base-on-the-BlackBerry/td-p/1878673', '9465', '7', 'forum'),
(142, '238', '', 'http://occupywallst.org/article/GuestSub1/', '8905', '7', 'guest post - content@occupywallst.org'),
(143, '73', '', 'http://occupywallst.org/article/GuestSub1/', '8905', '7', 'guest post - content@occupywallst.org'),
(144, '203', '', 'http://www.clickz.com/clickz/column/2186867/click-rate-ppc', '9538', '7', 'write for us'),
(145, '242', '', 'http://www.clickz.com/clickz/column/2186867/click-rate-ppc', '9538', '7', 'write for us'),
(146, '205', '', 'http://www.freshbooks.com/blog/2011/01/12/five-money-mistakes-freelancers-make/', '8898', '7', 'guest post'),
(147, '244', '', 'http://www.freshbooks.com/blog/2011/01/12/five-money-mistakes-freelancers-make/', '8898', '7', 'guest post'),
(148, '77', '', 'http://www.clickz.com/clickz/column/2186867/click-rate-ppc', '9538', '7', 'write for us'),
(149, '211', 'david@incubate.com.au', 'http://www.resilience.org/sessions/new', '8903', '7', 'guest post'),
(150, '250', 'david@incubate.com.au', 'http://www.resilience.org/sessions/new', '8903', '7', 'guest post'),
(151, '83', 'david@incubate.com.au', 'http://www.resilience.org/sessions/new', '8903', '7', 'guest post'),
(152, '214', '', 'http://www.utmb.edu/impact/article.aspx?IAID=131', '84013', '7', 'submit an article'),
(153, '253', '', 'http://www.utmb.edu/impact/article.aspx?IAID=131', '84013', '7', 'submit an article'),
(154, '86', '', 'http://www.utmb.edu/impact/article.aspx?IAID=131', '84013', '7', 'submit an article'),
(155, '230', '', 'http://www.acslaw.org/acsblog/guest-blogger-can-general-motors-survive', '9485', '7', 'guest post'),
(156, '269', '', 'http://www.acslaw.org/acsblog/guest-blogger-can-general-motors-survive', '9485', '7', 'guest post'),
(157, '102', '', 'http://www.acslaw.org/acsblog/guest-blogger-can-general-motors-survive', '9485', '7', 'guest post'),
(158, '233', '', 'http://www.findunifi.com/buying-car-insurance-in-australia-get-the-facts/', '121493', '7', 'write for us'),
(159, '272', '', 'http://www.findunifi.com/buying-car-insurance-in-australia-get-the-facts/', '121493', '7', 'write for us'),
(160, '105', '', 'http://www.findunifi.com/buying-car-insurance-in-australia-get-the-facts/', '121493', '7', 'write for us'),
(161, '240', '', 'http://www.gothamgazette.com/blogs/wonkster/2012/02/22/new-york-state-on-ebay/', '121667', '7', 'write for us'),
(162, '279', '', 'http://www.gothamgazette.com/blogs/wonkster/2012/02/22/new-york-state-on-ebay/', '121667', '7', 'write for us'),
(163, '112', '', 'http://www.gothamgazette.com/blogs/wonkster/2012/02/22/new-york-state-on-ebay/', '121667', '7', 'write for us'),
(164, '241', '', 'http://www.rubiconpersonalip.com/contributors/why-did-they-become-a-contributor-.html', '48793', '7', 'become a contributor'),
(165, '241', '', 'http://journalauthors.tandf.co.uk/', '51380', '7', 'submit an article'),
(166, '280', '', 'http://www.rubiconpersonalip.com/contributors/why-did-they-become-a-contributor-.html', '48793', '7', 'become a contributor'),
(167, '113', '', 'http://www.rubiconpersonalip.com/contributors/why-did-they-become-a-contributor-.html', '48793', '7', 'become a contributor'),
(168, '247', '', 'http://world-lotteries.org/cms/index.php?option=com_content&view=article&id=4115:wla-apla-seminar-hanoi-2012&catid=189:current-seminars&Itemid=40&lang=en', '114626', '7', 'become a contributor'),
(169, '286', '', 'http://world-lotteries.org/cms/index.php?option=com_content&view=article&id=4115:wla-apla-seminar-hanoi-2012&catid=189:current-seminars&Itemid=40&lang=en', '114626', '7', 'become a contributor'),
(170, '119', '', 'http://world-lotteries.org/cms/index.php?option=com_content&view=article&id=4115:wla-apla-seminar-hanoi-2012&catid=189:current-seminars&Itemid=40&lang=en', '114626', '7', 'become a contributor'),
(171, '248', '', 'http://www.magickaschool.com/boards/viewtopic.php?f=45&t=5674&view=next', '48204', '7', 'submit an article'),
(172, '287', '', 'http://www.magickaschool.com/boards/viewtopic.php?f=45&t=5674&view=next', '48204', '7', 'submit an article'),
(173, '120', '', 'http://www.magickaschool.com/boards/viewtopic.php?f=45&t=5674&view=next', '48204', '7', 'submit an article'),
(174, '257', '', 'http://www.tate.org.uk/about/our-work/tate-research/contribute-tate-papers', '54843', '7', 'submit an article'),
(175, '296', '', 'http://www.tate.org.uk/about/our-work/tate-research/contribute-tate-papers', '54843', '7', 'submit an article'),
(176, '129', '', 'http://www.tate.org.uk/about/our-work/tate-research/contribute-tate-papers', '54843', '7', 'submit an article'),
(177, '262', '', 'http://bgr.com/2008/07/31/want-to-write-for-bgr-4/', '9317', '7', 'guest post'),
(178, '301', '', 'http://bgr.com/2008/07/31/want-to-write-for-bgr-4/', '9317', '7', 'guest post'),
(179, '263', '', 'http://clinicalevidence.bmj.com/x/set/static/cms/contributors-page.html', '40204', '7', 'become a contributor'),
(180, '302', '', 'http://clinicalevidence.bmj.com/x/set/static/cms/contributors-page.html', '40204', '7', 'become a contributor'),
(181, '134', '', 'http://bgr.com/2008/07/31/want-to-write-for-bgr-4/', '9317', '7', 'guest post'),
(182, '268', '', 'http://www.kevinmd.com/blog/2010/09/patient-protection-affordable-care-act-individual-mandate-controversy.html', '81653', '7', 'submit a guest post'),
(183, '307', '', 'http://www.kevinmd.com/blog/2010/09/patient-protection-affordable-care-act-individual-mandate-controversy.html', '81653', '7', 'submit a guest post'),
(184, '268', '', 'http://www.lancs.ac.uk/jais/contributors/', '53671', '7', 'submit an article'),
(185, '139', '', 'http://www.kevinmd.com/blog/2010/09/patient-protection-affordable-care-act-individual-mandate-controversy.html', '81653', '7', 'submit a guest post'),
(186, '307', '', 'http://www.lancs.ac.uk/jais/contributors/', '53671', '7', 'submit an article'),
(187, '272', '', 'http://www.bloggingstocks.com/2006/05/22/got-perspective-passion-and-smarts-bloggers-wanted/', '9516', '7', 'bloggers wanted'),
(188, '143', '', 'http://www.bloggingstocks.com/2006/05/22/got-perspective-passion-and-smarts-bloggers-wanted/', '9516', '7', 'bloggers wanted'),
(189, '311', '', 'http://www.bloggingstocks.com/2006/05/22/got-perspective-passion-and-smarts-bloggers-wanted/', '9516', '7', 'bloggers wanted'),
(190, '143', '', 'http://www.asha.org/Publications/leader/2012/120918/Genetics--Research-Trends.htm', '9501', '7', 'write for us'),
(191, '272', '', 'http://www.asha.org/Publications/leader/2012/120918/Genetics--Research-Trends.htm', '9501', '7', 'write for us'),
(192, '311', '', 'http://www.asha.org/Publications/leader/2012/120918/Genetics--Research-Trends.htm', '9501', '7', 'write for us'),
(193, '146', '', 'http://www.pointsoflight.org/blog/2012/05/21/business-at-the-national-conference-on-volunteer-and-service', '9251', '7', 'submit a guest post'),
(194, '275', '', 'http://www.pointsoflight.org/blog/2012/05/21/business-at-the-national-conference-on-volunteer-and-service', '9251', '7', 'submit a guest post'),
(195, '314', '', 'http://www.pointsoflight.org/blog/2012/05/21/business-at-the-national-conference-on-volunteer-and-service', '9251', '7', 'submit a guest post'),
(196, '146', '', 'http://www.raspberrypi.org/phpBB3/viewtopic.php?f=26&t=35737', '9721', '7', 'become a contributor'),
(197, '146', '', 'http://www.isaca.org/Journal/Submit-an-Article/Pages/Submit-an-Article.aspx', '9649', '7', 'factual article'),
(198, '275', '', 'http://www.raspberrypi.org/phpBB3/viewtopic.php?f=26&t=35737', '9721', '7', 'become a contributor'),
(199, '314', '', 'http://www.raspberrypi.org/phpBB3/viewtopic.php?f=26&t=35737', '9721', '7', 'become a contributor'),
(200, '154', '', 'http://bleacherreport.com/articles/1289042-arizona-cardinals-one-question-for-every-player-on-the-defense', '9318', '7', 'become a contributor'),
(201, '283', '', 'http://bleacherreport.com/articles/1289042-arizona-cardinals-one-question-for-every-player-on-the-defense', '9318', '7', 'become a contributor'),
(202, '322', '', 'http://bleacherreport.com/articles/1289042-arizona-cardinals-one-question-for-every-player-on-the-defense', '9318', '7', 'become a contributor'),
(203, '288', '', 'http://jalopnik.com/', '12', '7', 'sent'),
(204, '159', '', 'http://jalopnik.com/', '12', '7', 'sent'),
(205, '292', '', 'http://www.telerik.com/community/forums/reporting/telerik-reporting/auto-increment-number-in-report.aspx', '9743', '7', 'bloggers wanted'),
(206, '327', '', 'http://jalopnik.com/', '12', '7', 'sent'),
(207, '292', '', 'http://collegeprowler.com/majors/autobody-and-collision-repair/', '9358', '7', 'become an author'),
(208, '327', '', 'http://collegeprowler.com/majors/autobody-and-collision-repair/', '9358', '7', 'become an author'),
(209, '163', '', 'http://www.telerik.com/community/forums/reporting/telerik-reporting/auto-increment-number-in-report.aspx', '9743', '7', 'bloggers wanted'),
(210, '333', '', 'http://themonkeycage.org/blog/2012/10/23/how-strong-is-the-u-s-navy-really/', '8896', '7', 'guest post'),
(211, '298', '', 'http://themonkeycage.org/blog/2012/10/23/how-strong-is-the-u-s-navy-really/', '8896', '7', 'guest post'),
(212, '169', '', 'http://themonkeycage.org/blog/2012/10/23/how-strong-is-the-u-s-navy-really/', '8896', '7', 'guest post'),
(213, '335', '', 'http://www.designfloat.com/blog/2012/05/17/seo-metrics-consider-when-buying-websites/', '9560', '7', 'write for us'),
(214, '300', '', 'http://www.designfloat.com/blog/2012/05/17/seo-metrics-consider-when-buying-websites/', '9560', '7', 'write for us'),
(215, '171', '', 'http://www.designfloat.com/blog/2012/05/17/seo-metrics-consider-when-buying-websites/', '9560', '7', 'write for us'),
(216, '341', '', 'http://www2.le.ac.uk/news/submit-an-article', '55467', '7', 'submit an article'),
(217, '306', '', 'http://www2.le.ac.uk/news/submit-an-article', '55467', '7', 'submit an article'),
(218, '177', '', 'http://www2.le.ac.uk/news/submit-an-article', '55467', '7', 'submit an article'),
(219, '342', '', 'http://www.psmag.com/politics/taking-high-speed-trains-into-the-future-20305/', '122736', '7', 'write for us'),
(220, '307', '', 'http://www.psmag.com/politics/taking-high-speed-trains-into-the-future-20305/', '122736', '7', 'write for us'),
(221, '346', '', 'http://www.cl.cam.ac.uk/local/web/subversion/', '52605', '7', 'become a contributor'),
(222, '178', '', 'http://www.psmag.com/politics/taking-high-speed-trains-into-the-future-20305/', '122736', '7', 'write for us'),
(223, '311', '', 'http://www.cl.cam.ac.uk/local/web/subversion/', '52605', '7', 'become a contributor'),
(224, '352', '', 'http://www.le.ac.uk/press/artists.html', '53692', '7', 'submit an article'),
(225, '352', '', 'http://www.popsci.com/taxonomy/term/2/0/', '20', '7', 'sent'),
(226, '184', '', 'http://www.le.ac.uk/press/artists.html', '53692', '7', 'submit an article'),
(227, '317', '', 'http://www.le.ac.uk/press/artists.html', '53692', '7', 'submit an article'),
(228, '364', '', 'http://www.aiche.org/community/chenected-and-social-media', '114700', '7', 'become a contributor'),
(229, '364', '', 'http://scienceworld.wolfram.com/info/faq.html', '114181', '7', 'become a contributor'),
(230, '196', '', 'http://www.aiche.org/community/chenected-and-social-media', '114700', '7', 'become a contributor'),
(231, '365', '', 'http://www.socresonline.org.uk/info/submit.html', '54652', '7', 'manuscript submission'),
(232, '329', '', 'http://www.aiche.org/community/chenected-and-social-media', '114700', '7', 'become a contributor'),
(233, '197', '', 'http://www.socresonline.org.uk/info/submit.html', '54652', '7', 'manuscript submission'),
(234, '366', '', 'http://www.aapa.org/news_and_publications/pa_pro_now/item.aspx?id=4349', '78948', '7', 'submit an article'),
(235, '330', '', 'http://www.aapa.org/news_and_publications/pa_pro_now/item.aspx?id=4349', '78948', '7', 'submit an article'),
(236, '198', '', 'http://www.aapa.org/news_and_publications/pa_pro_now/item.aspx?id=4349', '78948', '7', 'submit an article'),
(237, '366', '', 'http://www.gla.ac.uk/research/az/esharp/forauthors/howtosubmitanarticle/', '53225', '7', 'submit an article'),
(238, '330', '', 'http://www.gla.ac.uk/research/az/esharp/forauthors/howtosubmitanarticle/', '53225', '7', 'submit an article'),
(239, '198', '', 'http://www.gla.ac.uk/research/az/esharp/forauthors/howtosubmitanarticle/', '53225', '7', 'submit an article'),
(240, '342', '', 'http://thediplomat.com/pacific-money/2013/01/10/japanese-automakers-hope-for-better-year-in-china/', '9227', '7', 'write for us'),
(241, '342', '', 'http://www.vitae.ac.uk/researchers/1271-368671/Become-a-contributor-for-the-exciting-new-PGR-blog-.html', '55255', '7', 'become a contributor'),
(242, '378', '', 'http://thediplomat.com/pacific-money/2013/01/10/japanese-automakers-hope-for-better-year-in-china/', '9227', '7', 'write for us'),
(243, '210', '', 'http://thediplomat.com/pacific-money/2013/01/10/japanese-automakers-hope-for-better-year-in-china/', '9227', '7', 'write for us'),
(244, '350', '', 'http://betabeat.com/author/guest-post/', '9316', '7', 'guest post'),
(245, '386', '', 'http://betabeat.com/author/guest-post/', '9316', '7', 'guest post'),
(246, '218', '', 'http://betabeat.com/author/guest-post/', '9316', '7', 'guest post'),
(247, '357', '', 'http://www.ivygateblog.com/2009/02/adventures-in-downward-mobility-poor-rich-kids-is-the-tragicomedy-on-the-other-side-of-graduation/', '121944', '7', 'want to write for'),
(248, '358', '', 'http://www.do-it.org.uk/magazine/news/bloggerswanted', '52864', '7', 'bloggers wanted'),
(249, '393', '', 'http://www.ivygateblog.com/2009/02/adventures-in-downward-mobility-poor-rich-kids-is-the-tragicomedy-on-the-other-side-of-graduation/', '121944', '7', 'want to write for'),
(250, '225', '', 'http://www.ivygateblog.com/2009/02/adventures-in-downward-mobility-poor-rich-kids-is-the-tragicomedy-on-the-other-side-of-graduation/', '121944', '7', 'want to write for'),
(251, '359', '', 'http://www.nakedcapitalism.com/2009/05/guest-post-finance-view-of-political.html', '8901', '7', 'guest post'),
(252, '226', '', 'http://www.nakedcapitalism.com/2009/05/guest-post-finance-view-of-political.html', '8901', '7', 'guest post'),
(253, '394', '', 'http://www.nakedcapitalism.com/2009/05/guest-post-finance-view-of-political.html', '8901', '7', 'guest post'),
(254, '361', '', 'http://econlog.econlib.org/archives/2013/01/human_capital_s.html', '8904', '7', 'guest post'),
(255, '228', '', 'http://econlog.econlib.org/archives/2013/01/human_capital_s.html', '8904', '7', 'guest post'),
(256, '396', '', 'http://econlog.econlib.org/archives/2013/01/human_capital_s.html', '8904', '7', 'guest post'),
(257, '361', '', 'http://www.actiononhearingloss.org.uk/community/blogs.aspx', '52057', '7', 'want to write for'),
(258, '228', '', 'http://www.actiononhearingloss.org.uk/community/blogs.aspx', '52057', '7', 'want to write for'),
(259, '396', '', 'http://www.actiononhearingloss.org.uk/community/blogs.aspx', '52057', '7', 'want to write for');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Store registered users info' AUTO_INCREMENT=31 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `username`, `password`, `email_address`) VALUES
(27, '', '', 'tata', '81dc9bdb52d04dc20036dbd8313ed055', 'tt@gmail.com'),
(28, '', '', 'zozo', '81dc9bdb52d04dc20036dbd8313ed055', 'zz@yahoo.com'),
(29, '', '', 'davidadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'grabdavid@gmail.com'),
(30, '', '', 'rara', '81dc9bdb52d04dc20036dbd8313ed055', 'rara@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `pagename` varchar(32) NOT NULL,
  `type` enum('admin','editor','viewer') NOT NULL DEFAULT 'viewer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='This table joins ''membership'' and ''pages'' tables and gives a type or permission' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `username`, `pagename`, `type`) VALUES
(1, 'tata', 'statistics', 'viewer'),
(2, 'tata', 'dbmanager', 'editor'),
(3, 'zaza', 'url_preview', 'viewer'),
(4, 'zaza', 'url_upload', 'editor'),
(5, 'tata', 'url_download', 'viewer'),
(6, 'zozo', 'statistics', 'viewer'),
(7, 'zozo', 'dbmanager', 'viewer'),
(8, 'zozo', 'url_preview', 'editor'),
(9, 'zozo', 'url_upload', 'editor'),
(10, 'zozo', 'url_download', 'editor'),
(11, 'davidadmin', 'statistics', 'editor'),
(12, 'davidadmin', 'dbmanager', 'editor'),
(13, 'davidadmin', 'url_preview', 'editor'),
(14, 'davidadmin', 'url_upload', 'editor'),
(15, 'davidadmin', 'url_download', 'editor'),
(16, 'davidadmin', 'users_management', 'editor'),
(17, 'rara', 'statistics', 'viewer'),
(18, 'rara', 'dbmanager', 'editor'),
(19, 'rara', 'url_preview', 'editor'),
(20, 'rara', 'url_upload', 'editor'),
(21, 'rara', 'url_download', 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `store_id`
--

CREATE TABLE IF NOT EXISTS `store_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_id` int(11) NOT NULL,
  `last_id` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `file_name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this table collects value of maximum id number per insert.' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `store_id`
--

INSERT INTO `store_id` (`id`, `first_id`, `last_id`, `insert_time`, `file_name`) VALUES
(1, 0, 5, '2014-06-04 06:20:14', 'csv-file.csv'),
(2, 5, 8, '2014-06-04 08:26:22', 'test-1.csv'),
(3, 0, 0, '0000-00-00 00:00:00', '774921567ba60c45c8ccc339cd9dd34d---2-2.csv'),
(4, 0, 0, '0000-00-00 00:00:00', '0'),
(5, 0, 0, '0000-00-00 00:00:00', '2-2.csv');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
