//
//  LoginPageViewController.swift
//  UserLoginAndRegistration
//
//  Created by Jordan Esty on 4/13/16.
//  Copyright © 2016 Jordan Esty. All rights reserved.
//

import UIKit

class LoginPageViewController: UIViewController {

    @IBOutlet weak var loginNameField: UITextField!
    @IBOutlet weak var loginPWField: UITextField!

    
    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    //MARK: Actions
    
    @IBAction func loginButtonTapped(sender: UIButton) {
        let username = loginNameField.text
        let pw = loginPWField.text
        
        let usernameStored = NSUserDefaults.standardUserDefaults().stringForKey("username")
        
        let pwStored = NSUserDefaults.standardUserDefaults().stringForKey("password")
        if usernameStored == username{
            if pwStored == pw{
                
                //Successful login
                NSUserDefaults.standardUserDefaults().setBool(true, forKey: "isUserLoggedIn")
                //update
                NSUserDefaults.standardUserDefaults().synchronize()
                //login view not needed any more
                self.dismissViewControllerAnimated(true, completion: nil)
            }
            
        }
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
