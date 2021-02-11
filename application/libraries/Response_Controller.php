<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Response_Controller extends CI_Controller {



  	const SOME_ERROR_OCCUR		= 'Some error occured please tyr again.';

    const USER_SIGNUP_SUCCESS 	= 'User Signup successfully.';
    const MOBILE_NUMBER_NOT_VERIFY  =   'Please verify your mobile number.';
	  const USER_SIGNUP_ERROR 	= 'User Signup Not Completed.';
    const USER_NOT_FOUND        =   'User not found.';
    const DRIVER_NOT_FOUND      =   'Driver not found.';
    const DRIVER_SIGNUP_FEES    =   'Drivers Signup Fees.';
    const COMPANY_NOT_FOUND     =   'Company not found';
	  const OTP_SUCCESS           =  'Otp verification successfully.';
const PAYMENT_RESPONSE_SUCCESS    =  'your payment completed successfully.';
    const OTP_ERROR             =  'Please enter correct email or mobile number.';
    const OTP_SEND_SUCCESS      =   'OTP sent successfully.';
	const SEND_SUCCESS      =   'We have sent email, please check inbox for Username and Password.';
	
    const OTP_VERIFIED_SUCCESS  =   'OTP Verified successfully.';
	  const USER_SIGNIN_SUCCESS	= 'User Signin Successfully';
    const PASSWORD_CHANGE_SUCCESS   =   'Password change successfully.';

    const USER_SIGNIN_ERROR		= 'Invalid username or password';
    const PARTNER_SIGNIN_ERROR = 'Your account is not verified please verify it.';
    const INDIVIDUAL_PARTNER_SIGNUP_SUCCESS =   'partner signup success.';
    const INDIVIDUAL_PARTNER_SIGNUP_ERROR   =   'partner signup error.';

    const COMPANY_PARTNER_SIGNUP_SUCCESS    =   'Company partner signup success.';
    const COMPANY_PARTNER_SIGNUP_ERROR      =   'Company partner signup error.';
    const PARTNER_PORTFOLIO_SUCCESS         =   'Your portfolio add successfully.';
    const PARTNER_PORTFOLIO_ERROR           =   'Your portfolio full. Please remove image and try again.';

    const PARTNER_PORTFOLIO_FOUND             =   'Your portfolio found.';
    const PARTNER_PORTFOLIO_NOT_FOUND         =   'Your portfolio not found.';
    const PARTNER_PROFILE_FOUND             =   'Driver profile found.';
	  const USER_EMAIL_EXIST		= 'Email already exist.';

    const USER_EMAIL_ALLOWED	= 'Email is valid';
    const CITY_FOUND            =   'City list found.';
    const CITY_NOT_FOUND        =   'City not found.';
	  const USER_EMAIL_MOBILE_EXIST = 'Email & Mobile number already exist.';
    const USER_MOBILE_EXIST		= 'Mobile number already exist.';
    const USER_MOBILE_ALLOWED	= 'Mobile number is valid.';
    const USER_PROFILE_SUCCESS  = 'Your profile update successfully.';
    const USER_PROFILE_ERROR    = 'Your profile not update.';
  	const SERVICE_TYPE_FOUND    = 'Service category found.';
  	const SERVICE_TYPE_NOT_FOUND = 'Service category not found.';
    const SEARCH_SERVICE_NOT_FOUND = 'Search Service not available.';
    const SERVICE_FOUND         =   'Service found.';
    const SERVICE_NOT_FOUND     =   'Service not found';
    const SUB_SERVICE_FOUND     =   'Sub service found';
    const SUB_SERVICE_NOT_FOUND =   'Sub service not found';
    const CMS_FOUND             = 'Cms listing.';

    const CMS_DETAILS_FOUND     = 'Cms details.';
    const CMS_DETAILS_NOT_FOUND     = 'content not found.';

    const ADS_FOUND             =   'Advertise found.';
    const ADS_NOT_FOUND         =   'Advertise not found.';
	  const USER_SIGNOUT			= 'User Signout successfully.';
    const PLANS_FOUND           =  'Plans found';
    const PLANS_NOT_FOUND       =   'Plans not found';
    const RATE_CARD_UPDATE_SUCCESS    =   'Rate card uploaded successfully.';
    const RATE_CARD_UPDATE_ERROR    =   'Rate card not uploaded.';
    const RATE_CARD_LIST            =   'Rate card list.';
    const RATE_CARD_NOT_FOUND       =   'Rate card not found.';
    const SERVICE_BOOKING_SUCCESS   =   'Service booking successfull.';
    const SERVICE_BOOKING_ERROR     =   'Service not booked.';
    const BOOKING_HISTORY_SUCCESS   =   'Your service booking history.';
    const BOOKING_HISTORY_NOT_FOUND     =   'Your service booking history not found.';
    const BOOKING_DETAILS_SUCCESS       =   'Your service details.';
    const BOOKING_DETAILS_NOT_FOUND     =   'Service details not found.';
    const BOOKING_CANCEL_FOR_USER_SUCCESS = 'Service cancelled successfully.';
    const BOOKING_CANCEL_FOR_USER_ERROR = 'Service Has Been Already Cancelled.';
    
    const OPERATIONS_SERVICE_SUCCESS           =   'Operation Has Been Completed.';
    const OPERATIONS_SERVICE_ERROR            =   'Operation Has Not Been Completed.';
    const NOT_ENOUGH_FOR_BUY_SERVICE    =   'You have not enough points for buy this service.';
    
    const ALREADY_FEED_BACK_ADDED   =   'FeedBack already added.';
    const FEED_BACK_ADDED_SUCCESS   =   'Feedback added successful.';
    
    const FEED_BACK_SUCCESS         =   'Feedback details.';
    const FEED_BACK_ERROR           =   'Feedback details not found.';
    const PARTNER_REVIEW_FOUND      =   'Your service reviews.';
    const PARTNER_REVIEW_NOT_FOUND      =   'Your service reviews not found.';
    const REPORTS_RECORD_FOUND      =   'Reports record found.';
    const REPORTS_RECORD_NOT_FOUND  =   'Reports record not found.';
    const NEW_NOTIFICATION_FOUND    =   'New notification found.';
    const NEW_NOTIFICATION_NOT_FOUND =   'New notification not found.';
    const SERVICE_ALREADY_PROCESSED =   'Request already processed to someone.';

    const PARTNER_LOCATION_FOUND        =   'Partners current location.';
    const PARTNER_LOCATION_NOT_FOUND    =   'Partners not found.';
	
	  const NOTIFICATION_SUCCESS         =   'Notification details.';
	  const NOTIFICATION_BACK_ERROR      =   'Booking Id not found.';

    const DRIVER_ONLINE_NOW             =   'You are Online Now !';
	  const DRIVER_OFFLINE_NOW            =   'You are Offline Now!';
    const DRIVER_ACCOUNT_REMOVE            =   'Your account has been deleted!';
    const QUICK_INQUIRY_SUCCESS         =   'Your quick inquiry request has been sent, We’ll contact you soon. Thank you.';
    const QUICK_INQUIRY_ERROR           =   'Your quick inquiry request not send.';

    const COUPON_CODE_FOUND             = 'Coupon Code Has Been Found.';
    const COUPON_CODE_NOT_FOUND         = 'Coupon Code Has Been Not Found.';
    const COUPON_CODE_NOT_VALID         = 'Coupon Code Has Been Not Valid.';
    const COUPON_CODE_EXPIRIED          = 'Coupon Code Has Been Expired.';
    const NOTIFICATION_SEND             = 'Notification Has Been Send Successfully.';

    const USER_SAVED_LOCATION           = 'Users Saved Location List.';
    const DRIVER_EARNING_LIST           =  'Drivers Earnings List.';
    const DRIVER_EARNING_LIST_NOT_FOUND =   'Driver Earning Not Fount On This Date.';
    protected $http_status_codes = array(
		self::SOME_ERROR_OCCUR,
		self::USER_SIGNUP_ERROR,
    self::USER_SIGNUP_SUCCESS,
		self::USER_SIGNIN_SUCCESS,
		self::USER_SIGNIN_ERROR,
		self::USER_EMAIL_ALLOWED,
		self::USER_EMAIL_EXIST,
		self::USER_MOBILE_ALLOWED,
		self::USER_MOBILE_EXIST,
		self::USER_PROFILE_SUCCESS,
		self::USER_PROFILE_ERROR,
		self::USER_SIGNOUT,
    self::SERVICE_TYPE_FOUND,
    self::SERVICE_TYPE_NOT_FOUND,
    self::ADS_FOUND,
    self::ADS_NOT_FOUND,
    self::ALREADY_FEED_BACK_ADDED,
    self::BOOKING_CANCEL_FOR_USER_ERROR,
    self::BOOKING_CANCEL_FOR_USER_SUCCESS,
    self::BOOKING_DETAILS_NOT_FOUND,
    self::BOOKING_DETAILS_SUCCESS,
    self::BOOKING_HISTORY_NOT_FOUND,
    self::BOOKING_HISTORY_SUCCESS,
    self::CITY_FOUND,
    self::CITY_NOT_FOUND,
    self::CMS_DETAILS_FOUND,
    self::CMS_DETAILS_NOT_FOUND,
    self::CMS_FOUND,
    self::COMPANY_NOT_FOUND,
    self::COMPANY_PARTNER_SIGNUP_ERROR,
    self::COMPANY_PARTNER_SIGNUP_SUCCESS,
    self::FEED_BACK_ADDED_SUCCESS,
    self::FEED_BACK_ERROR,
    self::FEED_BACK_SUCCESS,
    self::INDIVIDUAL_PARTNER_SIGNUP_ERROR,
    self::INDIVIDUAL_PARTNER_SIGNUP_SUCCESS,
    self::MOBILE_NUMBER_NOT_VERIFY,
    self::NEW_NOTIFICATION_FOUND,
    self::NEW_NOTIFICATION_NOT_FOUND,
    self::NOT_ENOUGH_FOR_BUY_SERVICE,
    self::NOTIFICATION_BACK_ERROR,
    self::NOTIFICATION_SUCCESS,
    self::OTP_ERROR,
    self::OTP_SEND_SUCCESS,
    self::OTP_SUCCESS,
    self::OTP_VERIFIED_SUCCESS,
    self::PARTNER_LOCATION_FOUND,
    self::PARTNER_LOCATION_NOT_FOUND,
    self::PARTNER_PORTFOLIO_ERROR,
    self::PARTNER_PORTFOLIO_FOUND,
    self::PARTNER_PORTFOLIO_NOT_FOUND,
    self::PARTNER_PORTFOLIO_SUCCESS,
    self::PARTNER_PROFILE_FOUND,
    self::PARTNER_REVIEW_FOUND,
    self::PARTNER_REVIEW_NOT_FOUND,
    self::PARTNER_SIGNIN_ERROR,
    self::PASSWORD_CHANGE_SUCCESS,
    self::PLANS_FOUND,
    self::PLANS_NOT_FOUND,
    self::QUICK_INQUIRY_ERROR,
    self::QUICK_INQUIRY_SUCCESS,
    self::RATE_CARD_LIST,
    self::RATE_CARD_NOT_FOUND,
    self::RATE_CARD_UPDATE_ERROR,
    self::RATE_CARD_UPDATE_SUCCESS,
    self::REPORTS_RECORD_FOUND,
    self::REPORTS_RECORD_NOT_FOUND,
    self::DRIVER_ONLINE_NOW,
    self::DRIVER_OFFLINE_NOW
   );
}

