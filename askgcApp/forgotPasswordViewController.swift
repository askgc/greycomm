//
//  forgotPasswordViewController.swift
//  askgcApp
//
//  Created by Steve Jean on 4/25/16.
//  Copyright © 2016 Loyola Unversity Maryland. All rights reserved.
//

import UIKit

class forgotPasswordViewController: UIViewController{
    
    
    @IBOutlet weak var username: UITextField!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view.
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    override func prepareForSegue(segue:(UIStoryboardSegue!), sender: AnyObject!) {
        if (segue.identifier == "forgotpassword") {
            //get a reference to the destination view controller
            let destinationVC:forgotResetPasswordViewController = segue.destinationViewController as!forgotResetPasswordViewController
            //set properties on the destination view controller
            destinationVC.email = self.username.text!
            //etc...
        }
    }

    
    @IBAction func passwordreset(sender: UIButton) {
        
        
        
        let myUrl = NSURL(string: "http://www.cs.loyola.edu/~sjean/askgcApp/passwordreset.php")
        
        let request = NSMutableURLRequest(URL:myUrl!)
        
        request.HTTPMethod = "POST"
        
        let postInfo = "&email=\(username.text!)"
        
        
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
                
                
                let alertController = UIAlertController (title:"Forgot Password", message: getdata as! String, preferredStyle: UIAlertControllerStyle.Alert)
                
                alertController.addAction(UIAlertAction(title: "Dismiss", style: UIAlertActionStyle.Default, handler:
                    {   (action: UIAlertAction!) in
                        
                        
                        let check = "validate info"
                        
                        
                        
                        if(getdata!.isEqual(check))
                        {
                            //func prepareForSegue()
                            /*
                            
                            func prepareForSegue(segue: UIStoryboardSegue!, sender: AnyObject!)
                            {
                                if(segue.identifier == "forgotpassword")
                                {
                                     let svc = segue!.destinationViewController as! forgotResetPasswordViewController;
                                    
                                    svc.email = self.username.text
                                }
                                
                            }
                        */
                        
                            let storyBoard : UIStoryboard = UIStoryboard(name: "Main", bundle: nil)
                            
                            let nextViewController = storyBoard.instantiateViewControllerWithIdentifier("forgotResetPasswordViewController") as! forgotResetPasswordViewController
                            self.presentViewController(nextViewController, animated: true, completion: nil)
                        
                        
                            
                            
                            
                        }
                            
                }))
                
                self.presentViewController(alertController, animated: true, completion: nil)
                
            }
        }
        
        
        getInfo.resume()

        
        
    }
    
    

}
