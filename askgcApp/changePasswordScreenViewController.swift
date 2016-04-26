//
//  changePasswordScreenViewController.swift
//  askgcApp
//
//  Created by Steve Jean on 4/25/16.
//  Copyright © 2016 Loyola Unversity Maryland. All rights reserved.
//

import UIKit

class changePasswordScreenViewController: UIViewController{
    
    @IBOutlet weak var username: UITextField!
    
    @IBOutlet weak var currentpassword: UITextField!
    
    @IBOutlet weak var newpassword: UITextField!
    
    @IBOutlet weak var confirmnewpassword: UITextField!
    
    
    @IBAction func changePassword(sender: UIButton) {
        
        let myUrl = NSURL(string: "http://www.cs.loyola.edu/~sjean/askgcApp/changepassword.php")
        
        let request = NSMutableURLRequest(URL:myUrl!)
        
        request.HTTPMethod = "POST"
        
        let postInfo = "&email=\(username.text!)&current_password=\(currentpassword.text!)&new_password=\(newpassword.text!)&confirm_new_password=\(confirmnewpassword.text!)"
        
        
        request.HTTPBody = postInfo.dataUsingEncoding(NSUTF8StringEncoding)
        
        let getInfo = NSURLSession.sharedSession().dataTaskWithRequest(request)
        {
            data, response, error in
            
            if error != nil{
                
                print("error=\(error)")
                return
                
            }
            
            
            
            let getdata = NSString(data: data!, encoding: NSUTF8StringEncoding)
            NSOperationQueue.mainQueue().addOperationWithBlock{
                
                
                let alertController = UIAlertController (title:"Change Password", message: getdata as! String, preferredStyle: UIAlertControllerStyle.Alert)
                
                alertController.addAction(UIAlertAction(title: "Dismiss", style: UIAlertActionStyle.Default, handler:
                    {   (action: UIAlertAction!) in
                        
                        
                        
                        
                        
                        let check = "Your password was successfully changed."
                        
                        
                        
                        if(getdata!.isEqual(check))
                        {
                            let storyBoard : UIStoryboard = UIStoryboard(name: "Main", bundle: nil)
                            
                            let nextViewController = storyBoard.instantiateViewControllerWithIdentifier("askgcLoginViewController") as! askgcLoginViewController
                            self.presentViewController(nextViewController, animated: true, completion: nil)
                        }
                }))
                
                self.presentViewController(alertController, animated: true, completion: nil)
                
            }
        }
        
        
        getInfo.resume()
        

        
        
    }
    
    
    
}
