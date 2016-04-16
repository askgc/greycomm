//
//  ForgotMyPWViewController.swift
//  UserLoginAndRegistration
//
//  Created by Jordan Esty on 4/13/16.
//  Copyright © 2016 Jordan Esty. All rights reserved.
//

import UIKit

class ForgotMyPWViewController: UIViewController {

    // MARK: Properties
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
    
//MARK: Action
    
    
    @IBAction func submitButtonTapped(sender: UIButton) {
        
        let answer1 = answer1Field.text ?? ""
        let answer2 = answer2Field.text ?? ""
     
        //If field left blank
        if answer1.isEmpty || answer2.isEmpty
        {
        
                    self.dismissViewControllerAnimated(true, completion: nil)
            
        }
        
        self.dismissViewControllerAnimated(true, completion: nil)
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
