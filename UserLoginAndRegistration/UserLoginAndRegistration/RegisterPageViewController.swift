//
//  RegisterPageViewController.swift
//  UserLoginAndRegistration
//
//  Created by Jordan Esty on 4/12/16.
//  Copyright © 2016 Jordan Esty. All rights reserved.
//

import UIKit

class RegisterPageViewController: UIViewController {
    
    // MARK: Properties
    @IBOutlet weak var firstnameField: UITextField!
    @IBOutlet weak var lastnameField: UITextField!
    @IBOutlet weak var usernameField: UITextField!
    @IBOutlet weak var passwordField: UITextField!
    @IBOutlet weak var confirmpasswordField: UITextField!
    @IBOutlet weak var question1Field: UITextField!
    @IBOutlet weak var question2Field: UITextField!
    @IBOutlet weak var answer1Field: UITextField!
    @IBOutlet weak var answer2Field: UITextField!
    
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view.
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    // MARK: Actions
    
    @IBAction func alreadyHaveAccountButtonTapped(sender: UIButton) {
        
        self.dismissViewControllerAnimated(true, completion: nil)
        
    }
    
    @IBAction func registerButtonTapped(sender: UIButton) {
        
 // /*
         let username = usernameField.text!
         let pw = passwordField.text!
         let confirmpw = confirmpasswordField.text!
         let firstname = firstnameField.text!
         let lastname = lastnameField.text!
         let question1 = question1Field.text!
         let question2 = question2Field.text!
         let answer1 = answer1Field.text!
         let answer2 = answer2Field.text!
  //  */
        /*
        let username = "test2@test.com"
        let pw = "test"
        let confirmpw = "test"
        let firstname = "test2"
        let lastname = "user" 
        let question1 = "Who did what?"
        let question2 = "When?"
        let answer1 = "Idk"
        let answer2 = "Last night"
       */
        
        //check for empty fields
/*
     if(username!.isEmpty || pw!.isEmpty || confirmpw!.isEmpty || firstname!.isEmpty || lastname!.isEmpty || question1!.isEmpty || question2!.isEmpty || answer1!.isEmpty || answer2!.isEmpty){
     */
        if(username.isEmpty || pw.isEmpty || confirmpw.isEmpty || firstname.isEmpty || lastname.isEmpty || question1.isEmpty || question2.isEmpty || answer1.isEmpty || answer2.isEmpty){
            
         
         //Display alert message
         displayAlertMessage("All fields are required")
         
         return
         
         }
         
         if(!isValidEmail(username)){
         
         
         displayAlertMessage("Please use email format [a..z | 0..9]* @ [a..z | 0..9]*[.com]")
         
         }
 
         
         //Check if passwords match
         if(pw != confirmpw){
         
         //Display an alert message
         displayAlertMessage("Password do not match")
         
         return
         
         }
 
        //Send data to the server side
         
        let myUrl = NSURL(string: "http://www.cs.loyola.edu/~jesty/dbtest/register.php")
        let request = NSMutableURLRequest(URL:myUrl!)
        request.HTTPMethod = "POST"
        
        let postString = "first=\(firstname)&last=\(lastname)&username=\(username)&confirmusername=\(username)&password=\(pw)&confirmpassword=\(confirmpw)&question1=\(question1)&answer1=\(answer1) &question2=\(question2)&answer2=\(answer2)"
        
        
        //Goes to the URL and posts the information given to it
        request.HTTPBody = postString.dataUsingEncoding(NSUTF8StringEncoding)
        
        let task = NSURLSession.sharedSession().dataTaskWithRequest(request){
            data, response, error in
            
            if error != nil {
                
                print("error =\(error)")
                return
            }
            
            print ("response =\(response)")
            
            let responseString = NSString(data: data!, encoding: NSUTF8StringEncoding)
            print("responseString =\(responseString)")
        }
        task.resume()
        
        
        
        /*
         **Extra Fields****
         id
         userType
         userDate
         validateEmail
         activation
         */
        
        /*  //Store data locally
         NSUserDefaults.standardUserDefaults().setObject(username, forKey: "username")
         NSUserDefaults.standardUserDefaults().setObject(pw, forKey: "password")
         NSUserDefaults.standardUserDefaults().synchronize()
         //
         */
        //display alert message switch confirmation
        
        let myAlert = UIAlertController(title: "Alert", message: "Thank you for registering for ASKGC. We have a lot of resources available to you. Please contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582", preferredStyle: UIAlertControllerStyle.Alert)
        
        //What the button to dismiss the alert says and what it does: so in this case it dismisses the alert
        let okAction = UIAlertAction(title: "Ok", style: UIAlertActionStyle.Default){ action in
            self.dismissViewControllerAnimated(true, completion: nil)
            
        }
        
        myAlert.addAction(okAction)
        self.presentViewController(myAlert, animated: true, completion: nil)
        
    }
    
    
    
    func isValidEmail(testStr:String) -> Bool {
        
        print("validate emilId: \(testStr)")
        
        let emailRegEx = "[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}"
        
        let emailTest = NSPredicate(format:"SELF MATCHES %@", emailRegEx)
        
        let result = emailTest.evaluateWithObject(testStr)
        
        return result
        
    }
    
    func displayAlertMessage(userMessage: String){
        
        let myAlert = UIAlertController(title: "Alert", message: userMessage, preferredStyle: UIAlertControllerStyle.Alert)
        
        let okAction = UIAlertAction(title: "Ok", style: UIAlertActionStyle.Default, handler:nil)
        
        myAlert.addAction(okAction)
        
        
        self.presentViewController(myAlert, animated: true, completion: nil)
        
    }
    /*
     // MARK: - Navigation
     
     // In a storyboard-based application, you will often want to do a little preparation before navigation
     override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
     // Get the new view controller using segue.destinationViewController.
     // Pass the selected object to the new view controller.
     }
     */
    
}