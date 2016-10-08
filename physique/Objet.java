/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package physique;

/**
 *
 * @author Reed
 */
public class Objet
{
    protected final static double GRAVITE=1.0;
    protected final static double HAUTEUR_MAX_SAUT=100.0;
    protected final static double SOL=701.0;
    protected double vitesse_chute=0;
    protected double puissance_saut=-20.0;
    
    
    //position
    protected double x;
    protected double y;
    //vitesse
    protected double vx;
    protected double vy;
    //acceleration
    protected double ax;
    protected double ay;
    //taille
    protected double h;
    protected double l;
    
    private boolean jump=false;
    private boolean canJump=false;
    
    public Objet(double x, double y, double vx, double vy, double ax, double ay, double h, double l)
    {
        this.x=x;
        this.y=y;
        this.vx=vx;
        this.vy=vy;
        this.ax=ax;
        this.ay=ay;
        this.h=h;
        this.l=l;
    }
    
    public double getX()
    {
        return x;
    }
    
    public double getY()
    {
        return y;
    }
       
    public void avancer()
    {
        x=vx+x;
        canJump = isGround();
    }
    
    public void reculer()
    {
        x=x-vx;
        canJump = isGround();
    }
    
    public void sauter()
    {
        if(isGround())
        {
            vitesse_chute=puissance_saut;
            tomber();
        }
    }
    
    public void tomber()
    {
        y=y+vitesse_chute;
        vitesse_chute+=GRAVITE;
    }
    
    public boolean isGround()
    {
        return y >= SOL;
    }
        
    public void update()
    {
        if(x<0) x=799;
        else if(x>799) x=0;
        //gestion des y
        if(isGround()==false)
        {
            tomber();
            if(isGround()==true) y=SOL;
        }
    }
}
//System.out.println(saut);